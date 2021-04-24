<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;
use Tadcms\System\Traits\SlugAble;
use Tadcms\System\Traits\ThumbnailAble;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Tadcms\System\Traits\UserModifyAble;

/**
 * Tadcms\System\Models\Post
 *
 * @property int $id
 * @property int $created_by
 * @property int $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Tadcms\System\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Tadcms\System\Models\PostMeta[] $metas
 * @property-read int|null $metas_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Post extends Model implements TranslatableContract
{
    use UserModifyAble, ThumbnailAble, SlugAble, Translatable;
    
    protected $table = 'posts';
    protected $fillable = [
        'type',
        'status',
    ];
    
    protected $slugSource = 'title';
    public $translatedAttributes = [
        'title',
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
        return $this->belongsToMany(Taxonomy::class, 'term_taxonomies', 'term_id', 'taxonomy_id')
            ->wherePivot('term_type', '=', 'post-type')
            ->withPivot(['term_type']);
    }
}
