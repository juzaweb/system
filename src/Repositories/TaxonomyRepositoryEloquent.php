<?php

namespace Tadcms\System\Repositories;

use Tadcms\Repository\Eloquent\BaseRepository;
use Tadcms\Repository\Criteria\RequestCriteria;
use Tadcms\System\Repositories\TaxonomyRepository;
use Tadcms\System\Models\Taxonomy;

/**
 * Class TaxonomyRepositoryEloquent.
 *
 * @package namespace Tadcms\System\Repositories;
 */
class TaxonomyRepositoryEloquent extends BaseRepository implements TaxonomyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Taxonomy::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
