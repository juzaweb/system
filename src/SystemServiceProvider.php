<?php

namespace Tadcms\System;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;

/**
 * Class Tadcms\System\SystemServiceProvider
 *
 * @package    Tadcms\System
 * @author     The Anh Dang <dangtheanh16@gmail.com>
 * @link       https://github.com/theanhk/tadcms
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
    
    }
    
    protected function bootDatabases() {
        $this->loadMigrationsFrom(__DIR__.'/../databases/migrations');
        $this->loadFactoriesFrom(__DIR__.'/../databases/factories');
    }
}