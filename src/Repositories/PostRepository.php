<?php

namespace Lararepo\Repositories;

class PostRepository extends EloquentRepository
{
    public function model()
    {
        return \Tadcms\Models\Post::class;
    }
    
    
}