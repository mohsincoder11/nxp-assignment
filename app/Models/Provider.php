<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $guarded = [];
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
    public function products()
    {
        return $this->hasManyThrough(Product::class, Inventory::class, 'provider_id', 'id', 'id', 'product_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
