<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Provider extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
    public function products()
    {
        return $this->hasManyThrough(Product::class, Inventory::class, 'provider_id', 'id', 'id', 'product_id');
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
