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
 * @property string $taxonomy
 * @property int|null $parent_id
 * @property int $count
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property-read \Illuminate\Database\Eloquent\Collection|Taxonomy[] $childrens
 * @property-read int|null $childrens_count
 * @property-read Taxonomy|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Tadcms\System\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \Tadcms\System\Models\TaxonomyTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\Tadcms\System\Models\TaxonomyTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy whereTaxonomy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Taxonomy withTranslation()
 */
class Taxonomy extends Model implements TranslatableContract
{
    use UserModifyAble, Translatable, SlugAble;
    
    protected $table = 'taxonomies';
    protected $slugSource = 'name';

    protected $fillable = [
        'type',
        'taxonomy',
        'type',
        'parent_id',
        'total_post'
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
        return $this->belongsToMany('Tadcms\System\Models\Post', 'term_taxonomies', 'taxonomy_id', 'term_id');
    }
}
