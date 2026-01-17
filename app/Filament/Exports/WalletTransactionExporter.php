<?php

namespace App\Filament\Exports;

use App\Models\WalletTransaction;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class WalletTransactionExporter extends Exporter
{
    protected static ?string $model = WalletTransaction::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('created_at')
                ->label('Date'),
            ExportColumn::make('type')
                ->label('Type')
                ->formatStateUsing(fn (string $state): string => ucfirst($state)),
            ExportColumn::make('amount')
                ->label('Amount')
                ->formatStateUsing(fn ($state, $record) => 
                    ($record->type === 'credit' ? '+' : '-') . ' Rp ' . number_format($state, 0, ',', '.')
                ),
            ExportColumn::make('description')
                ->label('Description'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your wallet transaction export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
