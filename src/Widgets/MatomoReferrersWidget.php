<?php

namespace JeffersonGoncalves\FilamentMetricsMatomo\Widgets;

use Filament\Widgets\ChartWidget;
use JeffersonGoncalves\FilamentMetricsMatomo\Concerns\HasMatomoClient;
use JeffersonGoncalves\FilamentMetricsMatomo\Concerns\HasPeriodFilter;

class MatomoReferrersWidget extends ChartWidget
{
    use HasMatomoClient;
    use HasPeriodFilter;

    protected ?string $heading = null;

    protected static ?int $sort = 2;

    public function getHeading(): ?string
    {
        return __('filament-metrics-matomo::widgets.referrers.heading');
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

        $referrers = $this->cachedCall("referrers-{$period->value}", function () use ($period) {
            return $this->getMatomo()->referrerTypes($period);
        });

        if ($referrers === null || $referrers === []) {
            return [
                'datasets' => [],
                'labels' => [],
            ];
        }

        $labels = array_map(fn ($row) => $row->label, $referrers);
        $values = array_map(fn ($row) => $row->nbVisits, $referrers);
        $colors = array_slice([
            '#6366f1', '#10b981', '#f59e0b', '#ef4444',
            '#8b5cf6', '#06b6d4', '#ec4899', '#84cc16',
        ], 0, count($referrers));

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
