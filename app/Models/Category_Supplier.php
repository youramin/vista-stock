<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Supplier extends Model
{
    protected $guarded = ['id'];

    public function suppliers(){
        return $this->hasMany(Supplier::class, 'category_supplier_id', 'id');
    }

}
