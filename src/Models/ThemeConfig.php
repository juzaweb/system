<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

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
