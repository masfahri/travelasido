<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatusModel extends Model
{
    protected $table = 'order_status';
    protected $fillable = ['id', 'title', 'class'];
}
