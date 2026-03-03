<?php

namespace JeffersonGoncalves\FilamentMetricsMatomo\Tests;

use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use Filament\Actions\ActionsServiceProvider;
use Filament\Facades\Filament;
use Filament\FilamentServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Infolists\InfolistsServiceProvider;
use Filament\Notifications\NotificationsServiceProvider;
use Filament\Schemas\SchemasServiceProvider;
use Filament\SpatieLaravelSettingsPluginServiceProvider;
use Filament\Support\SupportServiceProvider;
use Filament\Tables\TablesServiceProvider;
use Filament\Widgets\WidgetsServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use JeffersonGoncalves\FilamentMetricsMatomo\FilamentMetricsMatomoServiceProvider;
use JeffersonGoncalves\FilamentMetricsMatomo\Tests\Fixtures\TestPanelProvider;
use JeffersonGoncalves\FilamentMetricsMatomo\Tests\Fixtures\TestUser;
use JeffersonGoncalves\MetricsMatomo\MatomoServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\LaravelSettings\LaravelSettingsServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->createUsersTable();
        $this->createSettingsTable();
        $this->seedSettings();

        // Filament v4's SupportServiceProvider overrides Livewire's DataStore
        // with DataStoreOverride using bind() instead of singleton(), causing
        // a new instance (with its own WeakMap) on every resolve. This breaks
        // getErrorBag() which stores/retrieves across different WeakMap instances.
        // Fix: resolve once and re-register as a singleton instance.
        $dataStore = app(\Livewire\Mechanisms\DataStore::class);
        app()->instance(\Livewire\Mechanisms\DataStore::class, $dataStore);

        Filament::setCurrentPanel(
            Filament::getDefaultPanel(),
        );

        $this->withoutVite();
    }

    /**
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            LivewireServiceProvider::class,
            BladeIconsServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
            SupportServiceProvider::class,
            FilamentServiceProvider::class,
            FormsServiceProvider::class,
            SchemasServiceProvider::class,
            TablesServiceProvider::class,
            ActionsServiceProvider::class,
            InfolistsServiceProvider::class,
            NotificationsServiceProvider::class,
            WidgetsServiceProvider::class,
            LaravelSettingsServiceProvider::class,
            SpatieLaravelSettingsPluginServiceProvider::class,
            MatomoServiceProvider::class,
            FilamentMetricsMatomoServiceProvider::class,
            TestPanelProvider::class,
        ];
    }

    /**
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getEnvironmentSetUp($app): void
    {
        config()->set('app.key', 'base64:'.base64_encode(random_bytes(32)));
        config()->set('database.default', 'testing');
        config()->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
        config()->set('auth.providers.users.model', TestUser::class);
    }

    protected function createUsersTable(): void
    {
        if (Schema::hasTable('users')) {
            return;
        }

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    protected function createSettingsTable(): void
    {
        if (Schema::hasTable('settings')) {
            return;
        }

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('group');
            $table->string('name');
            $table->boolean('locked')->default(false);
            $table->json('payload');
            $table->timestamps();

            $table->unique(['group', 'name']);
        });
    }

    protected function seedSettings(): void
    {
        $settings = [
            ['group' => 'metrics-matomo', 'name' => 'api_token', 'payload' => json_encode('test-token')],
            ['group' => 'metrics-matomo', 'name' => 'site_id', 'payload' => json_encode(1)],
            ['group' => 'metrics-matomo', 'name' => 'base_url', 'payload' => json_encode('https://matomo.example.com')],
            ['group' => 'metrics-matomo', 'name' => 'timezone', 'payload' => json_encode('UTC')],
        ];

        foreach ($settings as $setting) {
            \Illuminate\Support\Facades\DB::table('settings')->insert($setting);
        }
    }
}
