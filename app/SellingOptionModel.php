<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellingOptionModel extends Model
{
    protected $table = 'selling_option';
    protected $guard = [];
    protected $fillable = [
        'commission_type',
        'commission',
    ];
}
