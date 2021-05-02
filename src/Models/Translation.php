<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Tadcms\System\Models\Translation
 *
 * @property int $id
 * @property string $code
 * @property string|null $text
 * @property int $language_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Tadcms\System\Models\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|Translation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Translation extends Model
{
    protected $table = 'translations';
    protected $fillable = [
        'code',
        'language_id',
        'text'
    ];
    
    public function language() {
        return $this->belongsTo('Tadcms\System\Models\Language', 'language_id', 'id');
    }
}
