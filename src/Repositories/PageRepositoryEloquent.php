<?php

namespace Tadcms\System\Repositories;

use Tadcms\Repository\Eloquent\BaseRepository;
use Tadcms\Repository\Criteria\RequestCriteria;
use Tadcms\System\Models\Page;

/**
 * Class PageRepositoryEloquent.
 *
 * @package namespace Tadcms\System\Repositories;
 */
class PageRepositoryEloquent extends BaseRepository implements PageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Page::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
