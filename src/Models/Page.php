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

    protected $table = 'pages';
    protected $slugSource = 'name';

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

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function metas()
    {
        return $this->hasMany(PostMeta::class, 'post_id', 'id');
    }

    public function taxonomies()
    {
        return $this->belongsToMany('Tadcms\System\Models\Taxonomy', 'term_taxonomies', 'term_id', 'taxonomy_id');
    }
}
