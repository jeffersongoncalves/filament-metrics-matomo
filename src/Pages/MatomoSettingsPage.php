<?php

namespace JeffersonGoncalves\FilamentMetricsMatomo\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Cache;
use JeffersonGoncalves\FilamentAnalyticsCore\AbstractAnalyticsPlugin;
use JeffersonGoncalves\MetricsMatomo\Matomo;
use JeffersonGoncalves\MetricsMatomo\MatomoClient;
use JeffersonGoncalves\MetricsMatomo\Settings\MatomoSettings;

class MatomoSettingsPage extends SettingsPage
{
    protected static string $settings = MatomoSettings::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBarSquare;

    public static function getNavigationGroup(): ?string
    {
        return AbstractAnalyticsPlugin::navigationGroupFor('filament-metrics-matomo') ?? config('filament-metrics-matomo.navigation.group', 'Analytics');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-metrics-matomo.navigation.sort');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-metrics-matomo::pages.settings.navigation_label');
    }

    public function getTitle(): string
    {
        return __('filament-metrics-matomo::pages.settings.title');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make(__('filament-metrics-matomo::pages.settings.sections.connection'))
                    ->description(__('filament-metrics-matomo::pages.settings.sections.connection_description'))
                    ->schema([
                        TextInput::make('base_url')
                            ->label(__('filament-metrics-matomo::pages.settings.fields.base_url'))
                            ->placeholder(__('filament-metrics-matomo::pages.settings.fields.base_url_placeholder'))
                            ->helperText(__('filament-metrics-matomo::pages.settings.fields.base_url_helper'))
                            ->url()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('api_token')
                            ->label(__('filament-metrics-matomo::pages.settings.fields.api_token'))
                            ->helperText(__('filament-metrics-matomo::pages.settings.fields.api_token_helper'))
                            ->password()
                            ->revealable()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('site_id')
                            ->label(__('filament-metrics-matomo::pages.settings.fields.site_id'))
                            ->helperText(__('filament-metrics-matomo::pages.settings.fields.site_id_helper'))
                            ->numeric()
                            ->minValue(1)
                            ->required(),
                        Select::make('timezone')
                            ->label(__('filament-metrics-matomo::pages.settings.fields.timezone'))
                            ->placeholder(__('filament-metrics-matomo::pages.settings.fields.timezone_placeholder'))
                            ->options(fn (): array => collect(timezone_identifiers_list())
                                ->mapWithKeys(fn (string $tz): array => [$tz => $tz])
                                ->all())
                            ->searchable()
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('test_connection')
                ->label(__('filament-metrics-matomo::pages.settings.actions.test_connection'))
                ->icon(Heroicon::OutlinedSignal)
                ->action(function (): void {
                    try {
                        $settings = app(MatomoSettings::class);

                        $client = new MatomoClient(
                            token: $settings->api_token,
                            baseUrl: $settings->base_url,
                        );

                        $matomo = new Matomo($client);

                        $matomo->visitsSummary();

                        Notification::make()
                            ->title(__('filament-metrics-matomo::pages.settings.notifications.test_success'))
                            ->success()
                            ->send();
                    } catch (\Throwable $e) {
                        Notification::make()
                            ->title(__('filament-metrics-matomo::pages.settings.notifications.test_failure'))
                            ->body($e->getMessage())
                            ->danger()
                            ->send();
                    }
                }),
        ];
    }

    protected function afterSave(): void
    {
        $store = config('filament-metrics-matomo.cache_store');
        $cache = $store ? Cache::store($store) : Cache::store();

        $cache->forget('filament-metrics-matomo:live-counters');
        $cache->forget('filament-metrics-matomo:visits-summary-day');
        $cache->forget('filament-metrics-matomo:visits-summary-week');
        $cache->forget('filament-metrics-matomo:visits-summary-month');
        $cache->forget('filament-metrics-matomo:visits-summary-year');

        Notification::make()
            ->title(__('filament-metrics-matomo::pages.settings.notifications.saved'))
            ->success()
            ->send();
    }
}
