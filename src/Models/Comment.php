<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'post_id',
        'content',
        'status',
    ];
    
    public function post() {
        return $this->belongsTo('Tadcms\System\Models\Post', 'post_id', 'id');
    }
}
