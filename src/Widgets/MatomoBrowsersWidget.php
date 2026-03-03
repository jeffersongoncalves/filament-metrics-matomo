<?php

namespace JeffersonGoncalves\FilamentMetricsMatomo\Widgets;

use Filament\Widgets\ChartWidget;
use JeffersonGoncalves\FilamentMetricsMatomo\Concerns\HasMatomoClient;
use JeffersonGoncalves\FilamentMetricsMatomo\Concerns\HasPeriodFilter;

class MatomoBrowsersWidget extends ChartWidget
{
    use HasMatomoClient;
    use HasPeriodFilter;

    protected ?string $heading = null;

    protected static ?int $sort = 4;

    public function getHeading(): ?string
    {
        return __('filament-metrics-matomo::widgets.browsers.heading');
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
        $limit = (int) config('filament-metrics-matomo.table_row_limit', 10);

        $browsers = $this->cachedCall("browsers-{$period->value}", function () use ($period, $limit) {
            return $this->getMatomo()->browsers($period, 'today', $limit);
        });

        if ($browsers === null || $browsers === []) {
            return [
                'datasets' => [],
                'labels' => [],
            ];
        }

        $labels = array_map(fn ($row) => $row->label, $browsers);
        $values = array_map(fn ($row) => $row->nbVisits, $browsers);
        $colors = array_slice([
            '#6366f1', '#10b981', '#f59e0b', '#ef4444',
            '#8b5cf6', '#06b6d4', '#ec4899', '#84cc16',
            '#14b8a6', '#a855f7',
        ], 0, count($browsers));

        return [
            'datasets' => [
                [
                    'label' => __('filament-metrics-matomo::widgets.visits_summary.visits'),
                    'data' => $values,
                    'backgroundColor' => $colors,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
