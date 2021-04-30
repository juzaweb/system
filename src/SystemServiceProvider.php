<?php

namespace Tadcms\System;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;
use Tadcms\System\Providers\BladeCompilerServiceProvider;

/**
 * Class Tadcms\System\SystemServiceProvider
 *
 * @package    Tadcms\System
 * @author     The Anh Dang <dangtheanh16@gmail.com>
 * @link       https://github.com/tadcms/tadcms
 * @license    MIT
 */
class SystemServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Builder::defaultStringLength(150);
        $this->bootDatabases();
    }

    public function register()
    {
        $this->registerServiceProvider();
        $this->registerMergeConfigs();
        $this->app->register(BladeCompilerServiceProvider::class);
    }

    protected function bootDatabases()
    {
        $this->loadMigrationsFrom(__DIR__.'/../databases/migrations');
        $this->loadFactoriesFrom(__DIR__.'/../databases/factories');
    }

    protected function registerMergeConfigs()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/tadcms.php', 'tadcms'
        );

        /*$this->mergeConfigFrom(
            __DIR__ . '/../../config/themes.php', 'themes'
        );

        $this->mergeConfigFrom(
            __DIR__ . '/../../config/plugins.php', 'plugins'
        );*/
    }

    protected function registerServiceProvider() {
        $this->app->register(\Tadcms\System\Providers\RouteServiceProvider::class);
        //$this->app->register(\Tadcms\Providers\PluginServiceProvider::class);
        //$this->app->register(\Tadcms\Providers\BladeServiceProvider::class);
    }

    protected function bootPublishes() {
        $this->publishes([
            __DIR__.'/../config/tadcms.php' => config_path('tadcms.php'),
            __DIR__.'/../config/themes.php' => config_path('themes.php'),
            __DIR__.'/../config/plugins.php' => config_path('plugins.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../assets' => public_path('vendor/tadcms'),
        ], 'assets');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/tadcms/tadcms'),
        ], 'lang');
    }
}
