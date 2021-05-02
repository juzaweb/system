<?php

namespace Tadcms\System\Repositories;

use Tadcms\System\Models\Taxonomy;
use Tadcms\Repository\Eloquent\BaseRepository;

class TaxonomyRepository extends BaseRepository
{
    public function model()
    {
        return Taxonomy::class;
    }
}