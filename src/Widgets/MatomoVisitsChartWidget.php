<?php

namespace JeffersonGoncalves\FilamentMetricsMatomo\Widgets;

use Filament\Widgets\ChartWidget;
use JeffersonGoncalves\FilamentMetricsMatomo\Concerns\HasMatomoClient;
use JeffersonGoncalves\MetricsMatomo\Enums\Period;
use JeffersonGoncalves\MetricsMatomo\Queries\ReportQuery;

class MatomoVisitsChartWidget extends ChartWidget
{
    use HasMatomoClient;

    protected ?string $heading = null;

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = -1;

    public ?string $filter = '30';

    public function getHeading(): ?string
    {
        return __('filament-metrics-matomo::widgets.visits_chart.heading');
    }

    protected function getFilters(): ?array
    {
        return [
            '7' => (string) __('filament-metrics-matomo::widgets.days_filter.7'),
            '14' => (string) __('filament-metrics-matomo::widgets.days_filter.14'),
            '30' => (string) __('filament-metrics-matomo::widgets.days_filter.30'),
            '90' => (string) __('filament-metrics-matomo::widgets.days_filter.90'),
        ];
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

        $days = (int) ($this->filter ?? 30);

        $data = $this->cachedCall("visits-chart-last{$days}", function () use ($days) {
            $query = ReportQuery::make('VisitsSummary', 'get')
                ->period(Period::Day)
                ->date("last{$days}");

            return $this->getMatomo()->report($query);
        });

        if ($data === null || ! is_array($data)) {
            return [
                'datasets' => [],
                'labels' => [],
            ];
        }

        $labels = [];
        $visits = [];
        $visitors = [];

        foreach ($data as $date => $row) {
            if (! is_array($row)) {
                continue;
            }

            $labels[] = $date;
            $visits[] = $row['nb_visits'] ?? 0;
            $visitors[] = $row['nb_uniq_visitors'] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => __('filament-metrics-matomo::widgets.visits_chart.visits'),
                    'data' => $visits,
                    'borderColor' => '#6366f1',
                    'backgroundColor' => 'rgba(99, 102, 241, 0.1)',
                    'fill' => true,
                ],
                [
                    'label' => __('filament-metrics-matomo::widgets.visits_chart.visitors'),
                    'data' => $visitors,
                    'borderColor' => '#10b981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
