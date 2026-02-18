<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessWifiOrderResource\Pages;
use App\Models\BusinessWifiOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BusinessWifiOrderResource extends Resource
{
    protected static ?string $model = BusinessWifiOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-wifi';
    protected static ?string $navigationLabel = 'Pesanan Wifi Bisnis';
    protected static ?string $modelLabel = 'Pesanan Wifi Bisnis';
    protected static ?string $pluralModelLabel = 'Pesanan Wifi Bisnis';

    public static function getNavigationGroup(): ?string
    {
        return 'Sistem & Konten';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Identitas Pribadi')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Akun')
                            ->required(),
                        Forms\Components\TextInput::make('ktp_name')
                            ->label('Nama Sesuai KTP')
                            ->required(),
                        Forms\Components\TextInput::make('phone')
                            ->label('Nomor HP / WhatsApp')
                            ->tel()
                            ->required(),
                        Forms\Components\FileUpload::make('ktp_photo_path')
                            ->label('Foto KTP')
                            ->image()
                            ->directory('business-wifi-photos/ktp'),
                    ])->columns(2),

                Forms\Components\Section::make('Informasi Bisnis')
                    ->schema([
                        Forms\Components\TextInput::make('company_name')
                            ->label('Nama Perusahaan/Toko')
                            ->required(),
                        Forms\Components\TextInput::make('business_field')
                            ->label('Bidang Usaha')
                            ->required(),
                        Forms\Components\Textarea::make('address')
                            ->label('Alamat Lengkap Bisnis')
                            ->rows(3)
                            ->columnSpanFull()
                            ->required(),
                        Forms\Components\TextInput::make('npwp')
                            ->label('NPWP')
                            ->required(),
                        Forms\Components\FileUpload::make('npwp_doc_path')
                            ->label('Foto / Dokumen NPWP')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'application/pdf'])
                            ->directory('business-wifi-photos/npwp'),
                        Forms\Components\FileUpload::make('nib_doc_path')
                            ->label('Dokumen NIB (Opsional)')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'application/pdf'])
                            ->directory('business-wifi-photos/nib'),
                    ])->columns(2),

                Forms\Components\Section::make('Lokasi Pemasangan')
                    ->schema([
                        Forms\Components\TextInput::make('latitude')
                            ->label('Latitude')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('longitude')
                            ->label('Longitude')
                            ->numeric()
                            ->required(),
                        Forms\Components\Placeholder::make('google_maps_link')
                            ->label('Google Maps')
                            ->content(
                                fn($record) => $record && $record->latitude && $record->longitude
                                ? new \Illuminate\Support\HtmlString('<a href="https://www.google.com/maps/search/?api=1&query=' . $record->latitude . ',' . $record->longitude . '" target="_blank" class="text-primary-600 hover:underline">Buka di Google Maps ↗</a>')
                                : '-'
                            ),
                    ])->columns(2),

                Forms\Components\Section::make('Paket & Foto Bisnis')
                    ->schema([
                        Forms\Components\TextInput::make('package_name')
                            ->label('Paket yang Dipilih')
                            ->required(),
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Menunggu',
                                'processing' => 'Diproses',
                                'completed' => 'Selesai',
                                'cancelled' => 'Dibatalkan',
                            ])
                            ->default('pending')
                            ->required(),
                        Forms\Components\FileUpload::make('business_photo_path')
                            ->label('Foto Depan Bisnis')
                            ->image()
                            ->directory('business-wifi-photos/bisnis')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Pesan')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('HP/WA')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_name')
                    ->label('Perusahaan/Toko')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->label('Alamat')
                    ->limit(30)
                    ->tooltip(fn($record) => $record->address),
                Tables\Columns\TextColumn::make('latitude')
                    ->label('Lat')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('longitude')
                    ->label('Long')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('package_name')
                    ->label('Paket'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Menunggu',
                        'processing' => 'Diproses',
                        'completed' => 'Selesai',
                        'cancelled' => 'Dibatalkan',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBusinessWifiOrders::route('/'),
        ];
    }
}
