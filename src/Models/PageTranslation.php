<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    public $timestamps = false;
    protected $table = 'page_translations';
    protected $fillable = [
        'locale',
        'name',
        'content',
        'thumbnail',
        'slug'
    ];
}
