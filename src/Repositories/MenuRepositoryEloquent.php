<?php

namespace Tadcms\System\Repositories;

use Tadcms\Repository\Eloquent\BaseRepository;
use Tadcms\System\Models\Menu;

/**
 * Class MenuRepositoryEloquent.
 *
 * @package namespace Tadcms\System\Repositories;
 */
class MenuRepositoryEloquent extends BaseRepository implements MenuRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Menu::class;
    }


    
}
