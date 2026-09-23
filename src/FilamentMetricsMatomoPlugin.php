<?php

namespace JeffersonGoncalves\FilamentMetricsMatomo;

use Filament\Panel;
use JeffersonGoncalves\FilamentAnalyticsCore\AbstractAnalyticsPlugin;
use JeffersonGoncalves\FilamentMetricsMatomo\Pages\MatomoSettingsPage;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoBrowsersWidget;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoCountriesWidget;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoDeviceTypesWidget;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoLiveCounterWidget;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoReferrersWidget;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoTopPagesWidget;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoVisitsChartWidget;
use JeffersonGoncalves\FilamentMetricsMatomo\Widgets\MatomoVisitsSummaryWidget;

class FilamentMetricsMatomoPlugin extends AbstractAnalyticsPlugin
{
    protected bool $hasSettingsPage = false;

    protected bool $hasLiveCounter = false;

    protected bool $hasVisitsSummary = false;

    protected bool $hasVisitsChart = false;

    protected bool $hasTopPages = false;

    protected bool $hasReferrers = false;

    protected bool $hasDeviceTypes = false;

    protected bool $hasBrowsers = false;

    protected bool $hasCountries = false;

    public function getId(): string
    {
        return 'filament-metrics-matomo';
    }

    protected function getSettingsPageClass(): ?string
    {
        return MatomoSettingsPage::class;
    }

    public function register(Panel $panel): void
    {
        parent::register($panel);

        $widgets = [];

        if ($this->hasLiveCounter) {
            $widgets[] = MatomoLiveCounterWidget::class;
        }

        if ($this->hasVisitsSummary) {
            $widgets[] = MatomoVisitsSummaryWidget::class;
        }

        if ($this->hasVisitsChart) {
            $widgets[] = MatomoVisitsChartWidget::class;
        }

        if ($this->hasTopPages) {
            $widgets[] = MatomoTopPagesWidget::class;
        }

        if ($this->hasReferrers) {
            $widgets[] = MatomoReferrersWidget::class;
        }

        if ($this->hasDeviceTypes) {
            $widgets[] = MatomoDeviceTypesWidget::class;
        }

        if ($this->hasBrowsers) {
            $widgets[] = MatomoBrowsersWidget::class;
        }

        if ($this->hasCountries) {
            $widgets[] = MatomoCountriesWidget::class;
        }

        if ($widgets !== []) {
            $panel->widgets($widgets);
        }
    }

    public function liveCounter(bool $condition = true): static
    {
        $this->hasLiveCounter = $condition;

        return $this;
    }

    public function visitsSummary(bool $condition = true): static
    {
        $this->hasVisitsSummary = $condition;

        return $this;
    }

    public function visitsChart(bool $condition = true): static
    {
        $this->hasVisitsChart = $condition;

        return $this;
    }

    public function topPages(bool $condition = true): static
    {
        $this->hasTopPages = $condition;

        return $this;
    }

    public function referrers(bool $condition = true): static
    {
        $this->hasReferrers = $condition;

        return $this;
    }

    public function deviceTypes(bool $condition = true): static
    {
        $this->hasDeviceTypes = $condition;

        return $this;
    }

    public function browsers(bool $condition = true): static
    {
        $this->hasBrowsers = $condition;

        return $this;
    }

    public function countries(bool $condition = true): static
    {
        $this->hasCountries = $condition;

        return $this;
    }

    public function allWidgets(bool $condition = true): static
    {
        return $this
            ->liveCounter($condition)
            ->visitsSummary($condition)
            ->visitsChart($condition)
            ->topPages($condition)
            ->referrers($condition)
            ->deviceTypes($condition)
            ->browsers($condition)
            ->countries($condition);
    }

    public function hasSettingsPage(): bool
    {
        return $this->hasSettingsPage;
    }

    public function hasLiveCounter(): bool
    {
        return $this->hasLiveCounter;
    }

    public function hasVisitsSummary(): bool
    {
        return $this->hasVisitsSummary;
    }

    public function hasVisitsChart(): bool
    {
        return $this->hasVisitsChart;
    }

    public function hasTopPages(): bool
    {
        return $this->hasTopPages;
    }

    public function hasReferrers(): bool
    {
        return $this->hasReferrers;
    }

    public function hasDeviceTypes(): bool
    {
        return $this->hasDeviceTypes;
    }

    public function hasBrowsers(): bool
    {
        return $this->hasBrowsers;
    }

    public function hasCountries(): bool
    {
        return $this->hasCountries;
    }
}
