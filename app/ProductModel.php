<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $guard = [];
    protected $fillable = [
        'name',
        'description',
        'stock',
        'price',
        'category_id'
    ];

    public function Category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
}
