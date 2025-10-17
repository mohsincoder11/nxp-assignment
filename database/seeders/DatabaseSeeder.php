<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $provider = Provider::factory()->create();
        $products = Product::factory()->count(3)->create();

        // create inventories with stock
        foreach ($products as $product) {
            Inventory::create([
                'provider_id' => $provider->id,
                'product_id'  => $product->id,
                'quantity'    => rand(5, 50),
            ]);
        }
    }
}
