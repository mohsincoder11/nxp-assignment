<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
