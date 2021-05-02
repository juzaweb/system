<?php

namespace Tadcms\System\Repositories;

use Tadcms\Repository\Eloquent\BaseRepository;

class CommentRepository extends BaseRepository
{
    public function model()
    {
        return 'Tadcms\System\Models\Comment';
    }
}
