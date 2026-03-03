<?php

namespace JeffersonGoncalves\FilamentMetricsMatomo\Widgets;

use Filament\Widgets\ChartWidget;
use JeffersonGoncalves\FilamentMetricsMatomo\Concerns\HasMatomoClient;
use JeffersonGoncalves\FilamentMetricsMatomo\Concerns\HasPeriodFilter;

class MatomoDeviceTypesWidget extends ChartWidget
{
    use HasMatomoClient;
    use HasPeriodFilter;

    protected ?string $heading = null;

    protected static ?int $sort = 3;

    public function getHeading(): ?string
    {
        return __('filament-metrics-matomo::widgets.device_types.heading');
    }

    /**
     * @return array<string, mixed>
     */
    protected function getData(): array
    {
        if (! $this->isConfigured()) {
            return [
                'datasets' => [],
                'labels' => [],
            ];
        }

        $period = $this->getSelectedPeriod();

        $devices = $this->cachedCall("device-types-{$period->value}", function () use ($period) {
            return $this->getMatomo()->deviceTypes($period);
        });

        if ($devices === null || $devices === []) {
            return [
                'datasets' => [],
                'labels' => [],
            ];
        }

        $labels = array_map(fn ($row) => $row->label, $devices);
        $values = array_map(fn ($row) => $row->nbVisits, $devices);
        $colors = array_slice([
            '#6366f1', '#10b981', '#f59e0b', '#ef4444',
            '#8b5cf6', '#06b6d4', '#ec4899', '#84cc16',
        ], 0, count($devices));

        return [
            'datasets' => [
                [
                    'data' => $values,
                    'backgroundColor' => $colors,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
