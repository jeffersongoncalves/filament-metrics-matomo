<?php

namespace JeffersonGoncalves\FilamentMetricsMatomo\Widgets;

use Filament\Widgets\Widget;
use JeffersonGoncalves\FilamentMetricsMatomo\Concerns\HasMatomoClient;
use JeffersonGoncalves\FilamentMetricsMatomo\Concerns\HasPeriodFilter;

class MatomoTopPagesWidget extends Widget
{
    use HasMatomoClient;
    use HasPeriodFilter;

    /** @phpstan-ignore property.defaultValue */
    protected string $view = 'filament-metrics-matomo::widgets.table-widget';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 1;

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        if (! $this->isConfigured()) {
            return [
                'heading' => __('filament-metrics-matomo::widgets.top_pages.heading'),
                'icon' => 'heroicon-o-document-text',
                'columns' => [],
                'rows' => [],
                'error' => __('filament-metrics-matomo::widgets.not_configured'),
            ];
        }

        $period = $this->getSelectedPeriod();
        $limit = (int) config('filament-metrics-matomo.table_row_limit', 10);

        $pages = $this->cachedCall("top-pages-{$period->value}", function () use ($period, $limit) {
            return $this->getMatomo()->pageUrls($period, 'today', $limit);
        });

        if ($pages === null) {
            return [
                'heading' => __('filament-metrics-matomo::widgets.top_pages.heading'),
                'icon' => 'heroicon-o-document-text',
                'columns' => [],
                'rows' => [],
                'error' => __('filament-metrics-matomo::widgets.error'),
            ];
        }

        $rows = array_map(fn ($row) => [
            $row->label,
            number_format($row->nbVisits),
            number_format($row->nbUniqVisitors),
        ], $pages);

        return [
            'heading' => __('filament-metrics-matomo::widgets.top_pages.heading'),
            'icon' => 'heroicon-o-document-text',
            'columns' => [
                __('filament-metrics-matomo::widgets.top_pages.page'),
                __('filament-metrics-matomo::widgets.top_pages.visits'),
                __('filament-metrics-matomo::widgets.top_pages.unique_visitors'),
            ],
            'rows' => $rows,
            'error' => null,
        ];
    }
}
