<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomersModel extends Model
{
    protected $table = 'customers';
    protected $fillable = ['email', 'name', 'address', 'phone', 'level'];
    
}
