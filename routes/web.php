<?php

use App\Models\Inventory;
use App\Models\Order;
use App\Models\Product;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
        $providers = Provider::with('users')->get();
        $products = Product::get();
        $orders=Order::get();
        $inventory=Inventory::all();
        dump($inventory);

    return view('welcome', compact('providers','products','orders'));
});
Route::get('/login', function(){
    return 'login';
})->name('login');


