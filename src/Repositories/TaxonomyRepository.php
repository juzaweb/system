<?php

namespace Tadcms\System\Repositories;

use Theanh\Lararepo\Repositories\EloquentRepository;

class TaxonomyRepository extends EloquentRepository
{
    public function model()
    {
        return \Tadcms\System\Models\Taxonomy::class;
    }
}