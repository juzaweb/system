<?php

namespace Tadcms\System\Repositories;

use Illuminate\Support\Arr;
use Tadcms\System\Models\Taxonomy;
use Tadcms\Lararepo\Repositories\EloquentRepository;

class TaxonomyRepository extends EloquentRepository
{
    public function model()
    {
        return Taxonomy::class;
    }
    
    public function getConfig($taxonomy = null)
    {
        $types = apply_filters('taxonomies', []);
        if ($taxonomy) {
            return collect(Arr::get($types, $taxonomy, []));
        }
        return collect($types);
    }
}