<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

class TaxonomyTranslation extends Model
{
    public $timestamps = false;
    protected $table = 'taxonomy_translations';
    protected $fillable = [
        'locale',
        'taxonomy_id',
        'name',
        'thumbnail',
        'description'
    ];
}
