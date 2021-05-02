<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Tadcms\System\Models\PostTranslation
 *
 * @property int $id
 * @property int $post_id
 * @property string $locale
 * @property string $title
 * @property string|null $content
 * @property string|null $thumbnail
 * @property string $slug
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTranslation whereTitle($value)
 * @mixin \Eloquent
 */
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
