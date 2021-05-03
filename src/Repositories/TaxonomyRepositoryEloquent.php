<?php

namespace Tadcms\System\Repositories;

use Tadcms\Repository\Eloquent\BaseRepository;
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

    
}
