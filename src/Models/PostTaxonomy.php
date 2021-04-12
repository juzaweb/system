<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

class PostTaxonomy extends Model
{
    protected $table = 'post_taxonomies';
    protected $fillable = [
        'post_type'
    ];
}
