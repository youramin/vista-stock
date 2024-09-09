<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = ['id'];

    
    public function categorysupplier(){
        return $this->belongsTo(CategorySupplier::class, 'category_supplier_id', 'id');
    }
}
