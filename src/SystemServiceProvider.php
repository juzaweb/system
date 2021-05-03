<?php

namespace Tadcms\System;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;
use Tadcms\System\Providers\RepositoryServiceProvider;
use Tadcms\System\Middleware\XFrameHeadersMiddleware;
use Tadcms\System\Providers\BladeCompilerServiceProvider;
use Tadcms\System\Supports\HookAction;

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
        $this->bootMiddlewares();
    }

    public function register()
    {
        $this->registerServiceProvider();
        $this->registerMergeConfigs();
        $this->registerSingleton();
        $this->app->register(BladeCompilerServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
    }

    protected function bootDatabases()
    {
        $this->loadMigrationsFrom(__DIR__.'/../databases/migrations');
        $this->loadFactoriesFrom(__DIR__.'/../databases/factories');
    }

    protected function registerMergeConfigs()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/tadcms.php',
            'tadcms'
        );

        /*$this->mergeConfigFrom(
            __DIR__ . '/../../config/themes.php', 'themes'
        );

        $this->mergeConfigFrom(
            __DIR__ . '/../../config/plugins.php', 'plugins'
        );*/
    }

    protected function registerServiceProvider()
    {
        $this->app->register(\Tadcms\System\Providers\RouteServiceProvider::class);
        //$this->app->register(\Tadcms\Providers\PluginServiceProvider::class);
        //$this->app->register(\Tadcms\Providers\BladeServiceProvider::class);
    }

    protected function registerSingleton()
    {
        $this->app->singleton('tadcms.hook', function () {
            return new HookAction();
        });
    }

    protected function bootPublishes()
    {
        $this->publishes([
            __DIR__.'/../config/tadcms.php' => config_path('tadcms.php'),
            __DIR__.'/../config/themes.php' => config_path('themes.php'),
            __DIR__.'/../config/plugins.php' => config_path('plugins.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../assets' => public_path('tadcms/assets'),
        ], 'assets');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/tadcms'),
        ], 'lang');
    }

    protected function bootMiddlewares()
    {
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', XFrameHeadersMiddleware::class);
    }
}
