<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Tadcms\System\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string|null $content
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
class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content',
        'type',
        'created_by',
        'updated_by',
        'status',
    ];
    
    public function comments() {
        return $this->hasMany('Tadcms\System\Models\Comment', 'post_id', 'id');
    }
    
    public function metas() {
        return $this->hasMany('Tadcms\System\Models\PostMeta', 'post_id', 'id');
    }
    
    public function taxonomies() {
        return $this->morphToMany('Tadcms\System\Models\PostTaxonomy', 'post', 'post_taxonomies');
    }
}
