<?php

namespace App\Filament\Exports;

use App\Models\WithdrawalRequest;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class WithdrawalRequestExporter extends Exporter
{
    protected static ?string $model = WithdrawalRequest::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('created_at')
                ->label('Request Date'),
            ExportColumn::make('user.name')
                ->label('Partner'),
            ExportColumn::make('amount')
                ->label('Amount')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
            ExportColumn::make('status')
                ->label('Status')
                ->formatStateUsing(fn (string $state): string => ucfirst($state)),
            ExportColumn::make('bank_details')
                ->label('Bank Details'),
            ExportColumn::make('processor.name')
                ->label('Processed By'),
            ExportColumn::make('admin_note')
                ->label('Admin Note'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your withdrawal request export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
