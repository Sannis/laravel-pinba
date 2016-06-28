<?php

namespace Sannis\Pinba;

use Illuminate\Routing\Router;
use Illuminate\Session\SessionManager;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/pinba.php';
        $this->mergeConfigFrom($configPath, 'pinba');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/pinba.php';
        $this->publishes([$configPath => config_path('pinba.php')], 'config');

        // If enabled is null, set from the app.debug value
        $enabled = $this->app['config']->get('pinba.enabled');
        if (is_null($enabled)) {
            $enabled = $this->app['config']->get('app.debug');
        }

        if (extension_loaded('pinba')) {
            if ($enabled) {
                ini_set('pinba.enabled', true);
                ini_set('pinba.server', $this->app['config']->get('pinba.server'));

                $this->app['router']->middleware('pinba', HandlePinba::class);
            } else {
                ini_set('pinba.enabled', false);
            }
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['pinba'];
    }
}