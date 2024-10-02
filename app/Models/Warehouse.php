<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $guarded = ['id'];

    public function purchases(){
        return $this->hasMany(Purchase::class, 'warehouse_id', 'id');
    }

}
