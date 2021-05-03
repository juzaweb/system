<?php

namespace Tadcms\System\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static addAdminMenu($menuTitle, $menuSlug, array $args)
 * @method static registerTaxonomy($taxonomy, $objectType, array $args)
 * @method static registerPostType($key, array $args)
 * @method static registerMenuItem($key, $componentClass)
 * @see \Tadcms\System\Supports\HookAction
 * */
class HookAction extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tadcms.hook';
    }
}
