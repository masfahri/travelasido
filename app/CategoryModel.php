<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'description'];

    public function Products()
    {
        return $this->hasMany(ProductModel::class, 'category_id');
    }

}
