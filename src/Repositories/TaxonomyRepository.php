<?php

namespace Lararepo\Repositories;

class TaxonomyRepository extends EloquentRepository
{
    public function model()
    {
        return \Tadcms\Models\Taxonomy::class;
    }
}