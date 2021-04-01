<?php

namespace Tadcms\System\Repositories;

use Theanh\Lararepo\Repositories\EloquentRepository;

class PostRepository extends EloquentRepository
{
    public function model()
    {
        return \Tadcms\System\Models\Post::class;
    }
    
    
}