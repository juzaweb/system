<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;
use Tadcms\System\Traits\SlugAble;
use Tadcms\System\Traits\ThumbnailAble;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Tadcms\System\Traits\UserModifyAble;
/**
 * Class Page.
 *
 * @package namespace Tadcms\System\Models;
 */
class Page extends Model implements TranslatableContract
{
    use UserModifyAble, ThumbnailAble, SlugAble, Translatable;

    protected $table = 'page';
    protected $fillable = [
        'status',
        'template',
        'comment_count',
        'created_by',
        'updated_by'
    ];

    public $translatedAttributes = [
        'name',
        'content',
        'thumbnail',
        'slug'
    ];
}
