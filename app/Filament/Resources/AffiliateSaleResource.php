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

    protected static ?string $navigationGroup = 'Finance';
    protected static ?string $navigationLabel = 'Affiliate Commissions';

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
                    ->disabled()
                    ->required(),
                Forms\Components\Select::make('registration_id')
                    ->relationship('registration.training', 'title') // Shows Title of Training
                    ->label('Product / Training')
                    ->disabled(),
                Forms\Components\TextInput::make('commission_amount')
                    ->label('Commission')
                    ->numeric()
                    ->readOnly(),
                Forms\Components\TextInput::make('commission_percentage')
                    ->label('Percentage')
                    ->suffix('%')
                    ->readOnly(),
                Forms\Components\TextInput::make('status')
                    ->readOnly(),
                Forms\Components\DateTimePicker::make('created_at')
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
                    ->label('Date'),
                Tables\Columns\TextColumn::make('affiliate.user.name')
                    ->label('Affiliate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration.training.title')
                    ->label('Product')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('commission_amount')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'paid' => 'success',
                        'approved' => 'info',
                        'pending' => 'warning',
                        'rejected' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'paid' => 'Paid',
                        'rejected' => 'Rejected',
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
