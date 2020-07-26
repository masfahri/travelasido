<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SellerModel extends Model
{
    protected $table = 'sellers';
    protected $guard = [];
    protected $fillable = [
        'user_id',
        'email',
        'shopname',
        'name',
        'address',
        'phone',
    ];

    public function User()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function Products()
    {
        return $this->hasMany(ProductModel::class, 'seller_id');
    }
}
