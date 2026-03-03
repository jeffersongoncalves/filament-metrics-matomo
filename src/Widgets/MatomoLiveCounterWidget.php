<?php

namespace JeffersonGoncalves\FilamentMetricsMatomo\Widgets;

use Filament\Widgets\Widget;
use JeffersonGoncalves\FilamentMetricsMatomo\Concerns\HasMatomoClient;

class MatomoLiveCounterWidget extends Widget
{
    use HasMatomoClient;

    /** @phpstan-ignore property.defaultValue */
    protected string $view = 'filament-metrics-matomo::widgets.live-counter';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = -3;

    protected function getPollingInterval(): ?string
    {
        $seconds = (int) config('filament-metrics-matomo.live_counter_poll_interval', 30);

        return "{$seconds}s";
    }

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        if (! $this->isConfigured()) {
            return [
                'data' => null,
                'error' => __('filament-metrics-matomo::widgets.not_configured'),
                'lastMinutes' => 0,
            ];
        }

        $lastMinutes = (int) config('filament-metrics-matomo.live_counter_last_minutes', 30);

        $counter = $this->cachedCall('live-counters', function () use ($lastMinutes) {
            return $this->getMatomo()->liveCounters($lastMinutes)->toArray();
        });

        if ($counter === null) {
            return [
                'data' => null,
                'error' => __('filament-metrics-matomo::widgets.error'),
                'lastMinutes' => $lastMinutes,
            ];
        }

        return [
            'data' => $counter,
            'error' => null,
            'lastMinutes' => $lastMinutes,
        ];
    }
}
