<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Tadcms\System\Models\PostMeta
 *
 * @property int $post_id
 * @property string $meta_key
 * @property string|null $meta_value
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta whereMetaKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta whereMetaValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta wherePostId($value)
 * @mixin \Eloquent
 * @property int $id
 * @property-read \Tadcms\System\Models\Post $post
 * @method static \Illuminate\Database\Eloquent\Builder|PostMeta whereId($value)
 */
class PostMeta extends Model
{
    public $timestamps = false;
    protected $table = 'post_metas';
    protected $fillable = [
        'post_id',
        'meta_key',
        'meta_value',
    ];
    
    public function post() {
        return $this->belongsTo('Tadcms\System\Models\Post', 'post_id', 'id');
    }
}
