<?php

namespace Tadcms\System\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static addAdminMenu(string $menuTitle, $menuSlug, array $args)
 * @method static registerTaxonomy(string $taxonomy, $objectType, array $args)
 * @method static registerPostType(string $key, array $args)
 * @method static registerMenuItem(string $key, $componentClass)
 * @method static loadActionForm(string $path)
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
