<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrainingResource\Pages;
use App\Filament\Resources\TrainingResource\RelationManagers;
use App\Models\Training;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrainingResource extends Resource
{
    protected static ?string $model = Training::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Pembelajaran UpVenture';
    protected static ?string $modelLabel = 'Program Pelatihan';
    protected static ?string $pluralModelLabel = 'Program Pelatihan';

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen UpVenture';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->description('Masukkan judul, gambar, dan deskripsi pelatihan.')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Pelatihan')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),
                        Forms\Components\Hidden::make('user_id')
                            ->default(auth()->id()),
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug URL')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar Sampul')
                            ->image()
                            ->directory('trainings')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi Lengkap')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Detail Acara & Harga')
                    ->description('Atur jadwal, tipe acara (Online/Offline), dan harga tiket.')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DateTimePicker::make('event_date')
                                    ->label('Tanggal Acara')
                                    ->required()
                                    ->visible(fn(Forms\Get $get) => $get('category') !== 'class'), // Hide if class // Hide if class
                                Forms\Components\TextInput::make('price')
                                    ->label('Harga')
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->default(0)
                                    ->required(),
                                Forms\Components\Select::make('category')
                                    ->label('Kategori')
                                    ->options([
                                        'class' => 'Kelas Online',
                                        'webinar' => 'Webinar',
                                        'workshop' => 'Workshop',
                                    ])
                                    ->required()
                                    ->default('class')
                                    ->live()
                                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                                        if ($state === 'class') {
                                            $set('type', null);
                                            $set('event_date', null);
                                        }
                                    }),
                                Forms\Components\Select::make('type')
                                    ->label('Tipe Acara')
                                    ->options([
                                        'online' => 'Online',
                                        'offline' => 'Offline',
                                        'hybrid' => 'Hybrid',
                                    ])
                                    ->required() // Required only if visible
                                    ->live()
                                    ->visible(fn(Forms\Get $get) => $get('category') !== 'class'), // Hide if class
                            ]),

                        Forms\Components\TextInput::make('location_offline')
                            ->label('Lokasi (Alamat Lengkap)')
                            ->maxLength(255)
                            ->visible(fn(Forms\Get $get) => $get('category') !== 'class' && in_array($get('type'), ['offline', 'hybrid'])),
                        Forms\Components\Select::make('meeting_platform')
                            ->label('Platform')
                            ->options([
                                'Zoom' => 'Zoom',
                                'Google Meet' => 'Google Meet',
                                'Microsoft Teams' => 'Microsoft Teams',
                                'Youtube Live' => 'Youtube Live',
                                'Other' => 'Lainnya',
                            ])
                            ->visible(fn(Forms\Get $get) => $get('category') !== 'class' && in_array($get('type'), ['online', 'hybrid']))
                            ->reactive(),
                        Forms\Components\TextInput::make('location_online')
                            ->label(fn(Forms\Get $get) => ($get('meeting_platform') ?? 'Meeting') . ' Link')
                            ->maxLength(255)
                            ->visible(fn(Forms\Get $get) => $get('category') !== 'class' && in_array($get('type'), ['online', 'hybrid'])),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Publikasikan (Aktif)')
                            ->required()
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('partner.name')
                    ->label('Pembuat')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('partner.organization.name')
                    ->label('Organisasi')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'class', 'digital_class' => 'primary',
                        'webinar' => 'success',
                        'workshop' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'digital_class' => 'Kelas Online',
                        'class' => 'Kelas Online',
                        default => ucfirst($state),
                    }),
                Tables\Columns\TextColumn::make('event_date')
                    ->label('Tanggal Acara')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'online' => 'success',
                        'offline' => 'warning',
                        'hybrid' => 'info',
                    }),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])
            ->ownedByPartner();
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ModulesRelationManager::class,
            RelationManagers\RegistrationsRelationManager::class,
            RelationManagers\ModuleProgressRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrainings::route('/'),
            'create' => Pages\CreateTraining::route('/create'),
            'edit' => Pages\EditTraining::route('/{record}/edit'),
        ];
    }
}
