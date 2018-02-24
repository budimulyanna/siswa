<?php namespace Bantenprov\Siswa;

use Illuminate\Support\ServiceProvider;
use Bantenprov\Siswa\Console\Commands\SiswaCommand;

/**
 * The SiswaServiceProvider class
 *
 * @package Bantenprov\Siswa
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class SiswaServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('siswa', function ($app) {
            return new Siswa;
        });

        $this->app->singleton('command.siswa', function ($app) {
            return new SiswaCommand;
        });

        $this->commands('command.siswa');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'siswa',
            'command.siswa',
        ];
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/routes.php');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/../../config/config.php';
        $appConfigPath     = config_path('siswa.php');

        $this->mergeConfigFrom($packageConfigPath, 'siswa');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/../../resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'siswa');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/siswa'),
        ], 'lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/../../resources/views';

        $this->loadViewsFrom($packageViewsPath, 'siswa');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/siswa'),
        ], 'views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/../../resources/assets';

        $this->publishes([
            $packageAssetsPath => public_path('vendor/siswa'),
        ], 'public');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/../../database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }
}
