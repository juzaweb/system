<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Tadcms\System\Models\ThemeConfig
 *
 * @property int $id
 * @property string $theme
 * @property array|null $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ThemeConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ThemeConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ThemeConfig query()
 * @method static \Illuminate\Database\Eloquent\Builder|ThemeConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThemeConfig whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThemeConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThemeConfig whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ThemeConfig whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ThemeConfig extends Model
{
    protected $table = 'theme_configs';
    protected $fillable = [
        'theme',
        'data'
    ];
    
    public $casts = [
        'data' => 'array'
    ];
}
