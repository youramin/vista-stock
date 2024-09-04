<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Supplier extends Model
{
    protected $guarded = ['id'];

    public function category_supplier(){
        return $this->hasMany(Product::class, 'category_supplier_id', 'id');
    }

}
