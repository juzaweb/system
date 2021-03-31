<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

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
