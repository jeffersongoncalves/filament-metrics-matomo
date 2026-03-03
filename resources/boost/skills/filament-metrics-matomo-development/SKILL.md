---
name: filament-metrics-matomo-development
description: Build and work with Filament Metrics Matomo plugin features, including Matomo Analytics settings page, 8 dashboard widgets, connection testing, caching, and granular widget control.
---

# Filament Metrics Matomo Development

## When to use this skill

Use this skill when:
- Integrating Matomo Analytics into a Filament dashboard
- Configuring the Matomo settings page (base URL, API token, site ID, timezone)
- Working with Matomo dashboard widgets (live counter, visits summary, charts, top pages, referrers, devices, browsers, countries)
- Enabling/disabling specific widgets granularly
- Troubleshooting Matomo API connectivity, caching, or widget display issues

## Architecture

The plugin provides a Filament plugin class with granular control over a settings page and 8 dashboard widgets. All features are opt-in (default to `false`).

### Namespace

```
JeffersonGoncalves\FilamentMetricsMatomo
```

### Key Classes

| Class | Namespace | Purpose |
|-------|-----------|---------|
| `FilamentMetricsMatomoPlugin` | `JeffersonGoncalves\FilamentMetricsMatomo` | Main Filament plugin |
| `FilamentMetricsMatomoServiceProvider` | `JeffersonGoncalves\FilamentMetricsMatomo` | Service provider |
| `MatomoSettingsPage` | `JeffersonGoncalves\FilamentMetricsMatomo\Pages` | Settings page with "Test Connection" |
| `MatomoSettings` | `JeffersonGoncalves\MetricsMatomo\Settings` | Settings class (from `laravel-metrics-matomo`) |
| `MatomoClient` | `JeffersonGoncalves\MetricsMatomo` | API client (from `laravel-metrics-matomo`) |
| `Matomo` | `JeffersonGoncalves\MetricsMatomo` | Matomo service (from `laravel-metrics-matomo`) |

### Widget Classes

| Class | Namespace | Type |
|-------|-----------|------|
| `MatomoLiveCounterWidget` | `JeffersonGoncalves\FilamentMetricsMatomo\Widgets` | Stats (real-time polling) |
| `MatomoVisitsSummaryWidget` | `JeffersonGoncalves\FilamentMetricsMatomo\Widgets` | Stats Overview |
| `MatomoVisitsChartWidget` | `JeffersonGoncalves\FilamentMetricsMatomo\Widgets` | Line Chart |
| `MatomoTopPagesWidget` | `JeffersonGoncalves\FilamentMetricsMatomo\Widgets` | Table |
| `MatomoReferrersWidget` | `JeffersonGoncalves\FilamentMetricsMatomo\Widgets` | Doughnut Chart |
| `MatomoDeviceTypesWidget` | `JeffersonGoncalves\FilamentMetricsMatomo\Widgets` | Doughnut Chart |
| `MatomoBrowsersWidget` | `JeffersonGoncalves\FilamentMetricsMatomo\Widgets` | Bar Chart |
| `MatomoCountriesWidget` | `JeffersonGoncalves\FilamentMetricsMatomo\Widgets` | Table |

### Dependencies

- `jeffersongoncalves/laravel-metrics-matomo` ^1.0 - Core Matomo Analytics integration
- `filament/spatie-laravel-settings-plugin` ^5.0 - Filament settings page support
- `spatie/laravel-settings` - Database-backed settings

## Installation

```bash
composer require jeffersongoncalves/filament-metrics-matomo:"^3.0"
```

Publish and run the migrations:

```bash
php artisan vendor:publish --provider="Spatie\LaravelSettings\LaravelSettingsServiceProvider" --tag="migrations"
php artisan vendor:publish --provider="JeffersonGoncalves\MetricsMatomo\MatomoServiceProvider" --tag="matomo-migrations"
php artisan migrate
```

Optionally publish the config file:

```bash
php artisan vendor:publish --tag="filament-metrics-matomo-config"
```

### Version Compatibility

| Branch | Filament | Laravel | PHP | Livewire |
|--------|----------|---------|-----|----------|
| 1.x | 3.x | 10+ | 8.1+ | 3.x |
| 2.x | 4.x | 11+ | 8.2+ | 3.x |
| 3.x | 5.x | 11+ | 8.2+ | 4.x |

## Configuration

### Enable All Features

```php
use JeffersonGoncalves\FilamentMetricsMatomo\FilamentMetricsMatomoPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            FilamentMetricsMatomoPlugin::make()
                ->settingsPage()
                ->allWidgets(),
        ]);
}
```

### Enable Specific Widgets

```php
FilamentMetricsMatomoPlugin::make()
    ->settingsPage()
    ->liveCounter()
    ->visitsSummary()
    ->visitsChart()
    ->topPages()
    ->referrers()
    ->deviceTypes()
    ->browsers()
    ->countries()
```

### Disable Specific Widgets

```php
FilamentMetricsMatomoPlugin::make()
    ->settingsPage()
    ->allWidgets()
    ->countries(false)
    ->browsers(false)
```

### Plugin Methods

All methods default to `false`. You must explicitly enable features.

| Method | Default | Description |
|--------|---------|-------------|
| `settingsPage(bool)` | `false` | Enable/disable the settings page |
| `allWidgets(bool)` | N/A | Enable/disable all 8 widgets at once |
| `liveCounter(bool)` | `false` | Real-time visitor counter widget |
| `visitsSummary(bool)` | `false` | Visits summary stats widget |
| `visitsChart(bool)` | `false` | Visits over time chart widget |
| `topPages(bool)` | `false` | Top pages table widget |
| `referrers(bool)` | `false` | Referrer types chart widget |
| `deviceTypes(bool)` | `false` | Device types chart widget |
| `browsers(bool)` | `false` | Browser usage chart widget |
| `countries(bool)` | `false` | Countries table widget |

### Accessor Methods

```php
$plugin->hasSettingsPage();  // bool
$plugin->hasLiveCounter();   // bool
$plugin->hasVisitsSummary(); // bool
$plugin->hasVisitsChart();   // bool
$plugin->hasTopPages();      // bool
$plugin->hasReferrers();     // bool
$plugin->hasDeviceTypes();   // bool
$plugin->hasBrowsers();      // bool
$plugin->hasCountries();     // bool
```

### Config File

```php
// config/filament-metrics-matomo.php

return [
    'default_period' => 'day',          // day, week, month, year
    'cache_ttl' => 300,                 // seconds (0 to disable)
    'cache_store' => null,              // null = default store
    'live_counter_poll_interval' => 30, // seconds
    'live_counter_last_minutes' => 30,  // minutes
    'table_row_limit' => 10,           // rows in table widgets
    'navigation' => [
        'group' => 'Analytics',
        'sort' => null,
    ],
];
```

## Settings Page

The `MatomoSettingsPage` extends Filament's `SettingsPage` and uses `MatomoSettings` from the `laravel-metrics-matomo` package.

### Form Fields

**Connection Section:**

```php
TextInput::make('base_url')   // Matomo instance URL (required, URL validation)
TextInput::make('api_token')  // Matomo API token (password, revealable, required)
TextInput::make('site_id')    // Matomo Site ID (numeric, min: 1, required)
Select::make('timezone')      // Timezone selector (searchable, required)
```

### Test Connection Action

The settings page includes a "Test Connection" header action that verifies API connectivity:

```php
Action::make('test_connection')
    ->label(__('filament-metrics-matomo::pages.settings.actions.test_connection'))
    ->icon(Heroicon::OutlinedSignal)
    ->action(function (): void {
        $settings = app(MatomoSettings::class);
        $client = new MatomoClient(
            token: $settings->api_token,
            baseUrl: $settings->base_url,
        );
        $matomo = new Matomo($client);
        $matomo->visitsSummary(); // Tests the connection
    });
```

### Cache Clearing on Save

After saving settings, the page automatically clears cached Matomo data:

```php
protected function afterSave(): void
{
    $cache->forget('filament-metrics-matomo:live-counters');
    $cache->forget('filament-metrics-matomo:visits-summary-day');
    $cache->forget('filament-metrics-matomo:visits-summary-week');
    $cache->forget('filament-metrics-matomo:visits-summary-month');
    $cache->forget('filament-metrics-matomo:visits-summary-year');
}
```

### Navigation

- Group: configured via `config('filament-metrics-matomo.navigation.group', 'Analytics')`
- Sort: configured via `config('filament-metrics-matomo.navigation.sort')`
- Icon: `Heroicon::OutlinedChartBarSquare`

## Widgets

### Live Counter Widget
- Real-time visitor count with auto-polling
- Pulsating green dot indicator
- Poll interval: configurable (default 30 seconds)
- Shows visitors in the last N minutes (configurable)

### Visits Summary Widget
- Stats overview with unique visitors, visits, pageviews, bounce rate, average duration
- Supports period filtering (day, week, month, year)

### Visits Chart Widget
- Line chart showing visits over time
- Filter by 7, 14, 30, or 90 days

### Top Pages Widget
- Table listing most visited pages
- Row limit configurable via `table_row_limit` config

### Referrers Widget
- Doughnut chart showing referrer type distribution

### Device Types Widget
- Doughnut chart showing device distribution (desktop, mobile, tablet)

### Browsers Widget
- Bar chart showing browser usage

### Countries Widget
- Table listing visitor countries

## Localization

Translations are provided for English and Brazilian Portuguese (`pt_BR`).

## Troubleshooting

### All widgets show no data
**Cause**: Matomo API credentials have not been configured.
**Solution**: Navigate to the settings page, enter your Matomo base URL, API token, and Site ID. Use the "Test Connection" button to verify.

### Test Connection fails
**Cause**: Incorrect base URL, invalid API token, or network issues.
**Solution**: Verify the Matomo instance URL is correct (include `https://`), the API token has sufficient permissions, and the server is reachable.

### Widgets not appearing on dashboard
**Cause**: No widgets have been explicitly enabled. All widget methods default to `false`.
**Solution**: Call `->allWidgets()` or enable specific widgets individually (e.g., `->liveCounter()`, `->visitsSummary()`).

### Stale data after changing settings
**Cause**: Cached data from previous settings.
**Solution**: The plugin clears cache automatically on settings save. If issues persist, clear the cache manually or adjust `cache_ttl` in the config.

### Migration errors
**Cause**: Required migrations have not been published.
**Solution**: Publish both the spatie settings migration and the Matomo settings migration, then run `php artisan migrate`.
