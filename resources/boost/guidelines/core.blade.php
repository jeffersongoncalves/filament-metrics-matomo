## Filament Metrics Matomo

A Filament plugin that provides a Settings Page and 8 Dashboard Widgets for Matomo Analytics. Features a "Test Connection" button, configurable caching, and granular widget enable/disable control.

### Installation

@verbatim
<code-snippet name="Install the plugin" lang="bash">
composer require jeffersongoncalves/filament-metrics-matomo:"^3.0"
</code-snippet>
@endverbatim

### Publish and Run Migrations

@verbatim
<code-snippet name="Publish settings migrations" lang="bash">
php artisan vendor:publish --provider="Spatie\LaravelSettings\LaravelSettingsServiceProvider" --tag="migrations"
php artisan vendor:publish --provider="JeffersonGoncalves\MetricsMatomo\MatomoServiceProvider" --tag="matomo-migrations"
php artisan migrate
</code-snippet>
@endverbatim

### Register Plugin (All Widgets)

@verbatim
<code-snippet name="Register with all widgets" lang="php">
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
</code-snippet>
@endverbatim

### Register Plugin (Selective Widgets)

@verbatim
<code-snippet name="Enable specific widgets" lang="php">
use JeffersonGoncalves\FilamentMetricsMatomo\FilamentMetricsMatomoPlugin;

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
</code-snippet>
@endverbatim

### Disable Specific Widgets

@verbatim
<code-snippet name="All widgets except some" lang="php">
use JeffersonGoncalves\FilamentMetricsMatomo\FilamentMetricsMatomoPlugin;

FilamentMetricsMatomoPlugin::make()
    ->settingsPage()
    ->allWidgets()
    ->countries(false)
    ->browsers(false)
</code-snippet>
@endverbatim

### Widgets

| Widget | Description | Type |
|--------|-------------|------|
| Live Counter | Real-time visitors with auto-polling (pulsating green dot) | Stats |
| Visits Summary | Unique visitors, visits, pageviews, bounce rate, avg. duration | Stats Overview |
| Visits Chart | Line chart with visits over time (7/14/30/90 days filter) | Line Chart |
| Top Pages | Most visited pages | Table |
| Referrers | Referrer types distribution | Doughnut Chart |
| Device Types | Device distribution (desktop, mobile, tablet) | Doughnut Chart |
| Browsers | Browser usage | Bar Chart |
| Countries | Visitor countries | Table |

### Features
- Settings page with "Test Connection" button to verify Matomo API connectivity
- 8 dashboard widgets individually toggleable
- Configurable caching (TTL, cache store)
- Live counter with auto-polling interval configuration
- Multi-language support: English and Brazilian Portuguese (pt_BR)

### Best Practices
- Use `settingsPage()` and `allWidgets()` for quick setup with all features
- Use individual widget methods (`liveCounter()`, `visitsSummary()`, etc.) for granular control
- All features default to `false` -- you must explicitly enable what you need
- Use the "Test Connection" button on the settings page to verify API configuration
