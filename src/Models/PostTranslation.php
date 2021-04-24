<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    public $timestamps = false;
    protected $table = 'post_translations';
    protected $fillable = [
        'locale',
        'title',
        'content',
        'thumbnail',
        'slug'
    ];
}
