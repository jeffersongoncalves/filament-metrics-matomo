<div class="filament-hidden">

![Filament Metrics Matomo](https://raw.githubusercontent.com/jeffersongoncalves/filament-metrics-matomo/3.x/art/jeffersongoncalves-filament-metrics-matomo.png)

</div>

# Filament Metrics Matomo

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-metrics-matomo.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-metrics-matomo)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-metrics-matomo.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-metrics-matomo)
[![License](https://img.shields.io/packagist/l/jeffersongoncalves/filament-metrics-matomo.svg?style=flat-square)](LICENSE.md)

A Filament plugin that provides a Settings Page and Dashboard Widgets for [Matomo Analytics](https://matomo.org/), powered by [`jeffersongoncalves/laravel-metrics-matomo`](https://github.com/jeffersongoncalves/laravel-metrics-matomo).

## Version Compatibility

| Branch | Filament | Laravel | PHP | Livewire |
|--------|----------|---------|-----|----------|
| [1.x](https://github.com/jeffersongoncalves/filament-metrics-matomo/tree/1.x) | 3.x | 10+ | 8.1+ | 3.x |
| [2.x](https://github.com/jeffersongoncalves/filament-metrics-matomo/tree/2.x) | 4.x | 11+ | 8.2+ | 3.x |
| [3.x](https://github.com/jeffersongoncalves/filament-metrics-matomo/tree/3.x) | 5.x | 11+ | 8.2+ | 4.x |

> You are currently viewing the **3.x** branch (Filament v5).

## Features

- **Settings Page** - Configure Matomo connection (URL, API token, Site ID, Timezone) with a "Test Connection" button
- **Live Counter Widget** - Real-time visitors with auto-polling (pulsating green dot)
- **Visits Summary Widget** - Stats overview with unique visitors, visits, pageviews, bounce rate, avg. duration
- **Visits Chart Widget** - Line chart with visits over time (7/14/30/90 days filter)
- **Top Pages Widget** - Table with most visited pages
- **Referrers Widget** - Doughnut chart with referrer types
- **Device Types Widget** - Doughnut chart with device distribution
- **Browsers Widget** - Bar chart with browser usage
- **Countries Widget** - Table with visitor countries
- **Caching** - Configurable TTL and cache store
- **Translations** - English and Brazilian Portuguese (pt_BR) included

## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-metrics-matomo:"^3.0"
```

Make sure you have run the base package migrations:

```bash
php artisan vendor:publish --provider="Spatie\LaravelSettings\LaravelSettingsServiceProvider" --tag="migrations"
php artisan vendor:publish --provider="JeffersonGoncalves\MetricsMatomo\MatomoServiceProvider" --tag="matomo-migrations"
php artisan migrate
```

Optionally publish the config file:

```bash
php artisan vendor:publish --tag="filament-metrics-matomo-config"
```

## Usage

Register the plugin in your Filament Panel Provider:

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

### Enable/Disable Individual Widgets

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

Or disable specific ones:

```php
FilamentMetricsMatomoPlugin::make()
    ->settingsPage()
    ->allWidgets()
    ->countries(false)
    ->browsers(false)
```

## Configuration

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

## Testing

```bash
composer test
```

## Code Quality

```bash
composer analyse   # PHPStan
composer format    # Laravel Pint
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
