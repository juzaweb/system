<?php

namespace Tadcms\System\Repositories;

use Tadcms\System\Models\Comment;
use Tadcms\Lararepo\Repositories\EloquentRepository;

class CommentRepository extends EloquentRepository
{
    public function model()
    {
        return Comment::class;
    }
}
