<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusUsers extends Model
{
    protected $table = 'users_status';
    protected $guard = [];
    protected $fillable = [
        'title',
        'class',
    ];


}
