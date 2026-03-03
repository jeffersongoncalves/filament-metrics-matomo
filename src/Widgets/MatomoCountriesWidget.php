<?php

namespace JeffersonGoncalves\FilamentMetricsMatomo\Widgets;

use Filament\Widgets\Widget;
use JeffersonGoncalves\FilamentMetricsMatomo\Concerns\HasMatomoClient;
use JeffersonGoncalves\FilamentMetricsMatomo\Concerns\HasPeriodFilter;

class MatomoCountriesWidget extends Widget
{
    use HasMatomoClient;
    use HasPeriodFilter;

    /** @phpstan-ignore property.defaultValue */
    protected string $view = 'filament-metrics-matomo::widgets.table-widget';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 5;

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        if (! $this->isConfigured()) {
            return [
                'heading' => __('filament-metrics-matomo::widgets.countries.heading'),
                'icon' => 'heroicon-o-globe-alt',
                'columns' => [],
                'rows' => [],
                'error' => __('filament-metrics-matomo::widgets.not_configured'),
            ];
        }

        $period = $this->getSelectedPeriod();
        $limit = (int) config('filament-metrics-matomo.table_row_limit', 10);

        $countries = $this->cachedCall("countries-{$period->value}", function () use ($period, $limit) {
            return $this->getMatomo()->countries($period, 'today', $limit);
        });

        if ($countries === null) {
            return [
                'heading' => __('filament-metrics-matomo::widgets.countries.heading'),
                'icon' => 'heroicon-o-globe-alt',
                'columns' => [],
                'rows' => [],
                'error' => __('filament-metrics-matomo::widgets.error'),
            ];
        }

        $rows = array_map(fn ($row) => [
            $row->label,
            number_format($row->nbVisits),
            number_format($row->nbUniqVisitors),
        ], $countries);

        return [
            'heading' => __('filament-metrics-matomo::widgets.countries.heading'),
            'icon' => 'heroicon-o-globe-alt',
            'columns' => [
                __('filament-metrics-matomo::widgets.countries.country'),
                __('filament-metrics-matomo::widgets.countries.visits'),
                __('filament-metrics-matomo::widgets.countries.unique_visitors'),
            ],
            'rows' => $rows,
            'error' => null,
        ];
    }
}
