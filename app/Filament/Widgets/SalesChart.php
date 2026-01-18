<?php

namespace App\Filament\Widgets;

use App\Models\Registration;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class SalesChart extends ChartWidget
{
    protected static ?string $heading = 'Sales over time';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $data = Trend::model(Registration::class)
            ->between(
                start: now()->subYear(),
                end: now(),
            )
            ->perMonth()
            ->sum('total_amount');

        return [
            'datasets' => [
                [
                    'label' => 'Revenue',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
