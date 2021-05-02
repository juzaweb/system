<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Tadcms\System\Models\UserMeta
 *
 * @property int $user_id
 * @property string $meta_key
 * @property string|null $meta_value
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserMeta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMeta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMeta query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMeta whereMetaKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMeta whereMetaValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMeta whereUserId($value)
 * @mixin \Eloquent
 * @property int $id
 * @method static \Illuminate\Database\Eloquent\Builder|UserMeta whereId($value)
 */
class UserMeta extends Model
{
    public $timestamps = false;
    protected $table = 'user_metas';
    protected $fillable = [
        'user_id',
        'meta_key',
        'meta_value',
    ];
    
    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
