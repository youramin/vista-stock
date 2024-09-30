<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseProduct extends Model
{
    protected $guarded = ['id'];

    // Relasi dengan purchase
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    // Relasi dengan category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
