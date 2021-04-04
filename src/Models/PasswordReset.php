<?php

namespace Tadcms\System\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    public $timestamps = [
        'created_at'
    ];
    
    protected $table = 'password_resets';
    protected $fillable = [
        'email',
        'token',
    ];
}