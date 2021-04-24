<?php

namespace Tadcms\System\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Tadcms\System\Traits\SlugAble;
use Tadcms\System\Traits\UserModifyAble;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

/**
 * Tadcms\System\Models\Taxonomy
 *
 * @property int $id
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy query()
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Taxonomy extends Model implements TranslatableContract
{
    use UserModifyAble, Translatable, SlugAble;
    
    protected $table = 'taxonomies';
    protected $fillable = [
        'type',
        'taxonomy',
        'type',
        'parent_id',
    ];

    public $translatedAttributes = [
        'name',
        'description',
        'thumbnail',
        'slug'
    ];
    
    public function parent()
    {
        return $this->belongsTo(Taxonomy::class, 'parent_id', 'id');
    }
    
    public function childrens()
    {
        return $this->hasMany(Taxonomy::class, 'parent_id', 'id');
    }
    
    public function posts()
    {
        return $this->morphedByMany('Tadcms\System\Models\Post', 'post', 'post_taxonomies');
    }
}
