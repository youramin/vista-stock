<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'purchase_date' => 'date',
    ];
        
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'purchase_product')
                    ->withPivot('quantity', 'unit_price', 'total_price');
    }
    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
