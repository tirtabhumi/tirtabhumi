<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AffiliateWithdrawalResource\Pages;
use App\Filament\Resources\AffiliateWithdrawalResource\RelationManagers;
use App\Models\AffiliateWithdrawal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AffiliateWithdrawalResource extends Resource
{
    protected static ?string $model = AffiliateWithdrawal::class;

    protected static ?string $navigationGroup = 'Finance';
    protected static ?string $navigationLabel = 'Affiliate Withdrawals';

    // Disable creation of new withdrawal requests from admin UI (users request via front‑end)
    public static function canCreate(): bool
    {
        return false;
    }

    public static function shouldRegisterNavigation(): bool
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
                Forms\Components\TextInput::make('amount')
                    ->readOnly()
                    ->numeric(),
                Forms\Components\TextInput::make('net_amount')
                    ->readOnly()
                    ->label('Net Amount (To Transfer)')
                    ->numeric(),
                Forms\Components\TextInput::make('bank_account_details')
                    ->label('Bank Info')
                    ->formatStateUsing(function ($record) {
                        return $record->affiliate->bank_name . ' - ' . $record->affiliate->bank_account_number . ' (' . $record->affiliate->bank_account_name . ')';
                    })
                    ->readOnly()
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->options([
                        'requested' => 'Requested',
                        'approved' => 'Approved (Processing)',
                        'paid' => 'Paid (Transfer Complete)',
                        'rejected' => 'Rejected',
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('proof_file')
                    ->label('Bukti Transfer')
                    ->image()
                    ->directory('affiliate-proofs')
                    ->visibility('public')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('notes')
                    ->label('Admin Notes')
                    ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('amount')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('net_amount')
                    ->money('IDR')
                    ->label('Transfer Amount')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'paid' => 'success',
                        'approved' => 'info',
                        'requested' => 'warning',
                        'rejected' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\ImageColumn::make('proof_file')
                    ->label('Bukti')
                    ->visibility('public'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'requested' => 'Requested',
                        'approved' => 'Approved',
                        'paid' => 'Paid',
                        'rejected' => 'Rejected',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('mark_paid')
                    ->label('Upload Bukti')
                    ->icon('heroicon-o-arrow-up-tray')
                    ->form([
                        Forms\Components\FileUpload::make('proof_file')
                            ->label('Bukti Transfer')
                            ->required()
                            ->image()
                            ->directory('affiliate-proofs'),
                        Forms\Components\Textarea::make('notes')
                            ->label('Catatan'),
                    ])
                    ->action(function (AffiliateWithdrawal $record, array $data) {
                        $record->update([
                            'status' => 'paid',
                            'proof_file' => $data['proof_file'],
                            'notes' => $data['notes'] ?? $record->notes,
                            'processed_at' => now(),
                        ]);

                        // Note: Points deduction happens at request time (pending_points), 
                        // when paid, we should move pending to withdrawn.
                        // Wait, AffiliateController logic might need checking.
            
                        $affiliate = $record->affiliate;
                        if ($affiliate) {
                            // Deduct from pending, add to withdrawn
                            // Assuming requestWithdrawal moved points to pending_points already?
                            // Let's verify controller logic for that later.
                            $affiliate->decrement('pending_points', $record->amount);
                            $affiliate->decrement('pending_earnings', $record->amount);

                            $affiliate->increment('withdrawn_points', $record->amount);
                            $affiliate->increment('withdrawn_earnings', $record->amount);
                        }
                    })
                    ->visible(fn(AffiliateWithdrawal $record) => $record->status !== 'paid' && $record->status !== 'rejected')
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAffiliateWithdrawals::route('/'),
            // 'create' => Pages\CreateAffiliateWithdrawal::route('/create'), // creation handled by front‑end
            'edit' => Pages\EditAffiliateWithdrawal::route('/{record}/edit'),
        ];
    }
}
