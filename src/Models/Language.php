<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = [
        'code',
        'name'
    ];
    
    
}
