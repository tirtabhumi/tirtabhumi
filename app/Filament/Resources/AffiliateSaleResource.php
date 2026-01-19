<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AffiliateSaleResource\Pages;
use App\Filament\Resources\AffiliateSaleResource\RelationManagers;
use App\Models\AffiliateSale;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AffiliateSaleResource extends Resource
{
    protected static ?string $model = AffiliateSale::class;

    protected static ?string $navigationGroup = 'Keuangan & Afiliasi';
    protected static ?string $navigationLabel = 'Komisi Afiliasi';
    protected static ?string $modelLabel = 'Komisi Afiliasi';
    protected static ?string $pluralModelLabel = 'Komisi Afiliasi';

    // Prevent creation of affiliate commission records from admin UI
    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('affiliate_id')
                    ->relationship('affiliate.user', 'name')
                    ->label('Afiliator')
                    ->disabled()
                    ->required(),
                Forms\Components\Select::make('registration_id')
                    ->relationship('registration.training', 'title') // Shows Title of Training
                    ->label('Produk / Pelatihan')
                    ->disabled(),
                Forms\Components\TextInput::make('commission_amount')
                    ->label('Jumlah Komisi')
                    ->numeric()
                    ->readOnly(),
                Forms\Components\TextInput::make('commission_percentage')
                    ->label('Persentase')
                    ->suffix('%')
                    ->readOnly(),
                Forms\Components\TextInput::make('status')
                    ->label('Status')
                    ->readOnly(),
                Forms\Components\DateTimePicker::make('created_at')
                    ->label('Dibuat Pada')
                    ->readOnly(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Tanggal'),
                Tables\Columns\TextColumn::make('affiliate.user.name')
                    ->label('Afiliator')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration.training.title')
                    ->label('Produk')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('commission_amount')
                    ->label('Komisi')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'paid' => 'success',
                        'approved' => 'info',
                        'pending' => 'warning',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'paid' => 'Dibayar',
                        'approved' => 'Disetujui',
                        'pending' => 'Menunggu',
                        'rejected' => 'Ditolak',
                        default => ucfirst($state),
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Menunggu',
                        'approved' => 'Disetujui',
                        'paid' => 'Dibayar',
                        'rejected' => 'Ditolak',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAffiliateSales::route('/'),
            // 'create' => Pages\CreateAffiliateSale::route('/create'), // creation handled by system
            'edit' => Pages\EditAffiliateSale::route('/{record}/edit'),
        ];
    }
}
