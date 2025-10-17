<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $guarded = [];
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
