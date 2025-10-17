<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Provider;
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
        // Number of providers to create
        $providerCount = 5;

        // Create multiple providers
        Provider::factory()
            ->count($providerCount)
            ->create()
            ->each(function ($provider) {
                // Create at least one user for each provider
                User::factory()
                    ->count(1) // you can increase if needed
                    ->for($provider) // assumes User model has provider_id
                    ->create();

                // Create some products
                $products =Product::factory()->count(3)->create();

                // Create inventory for each product for this provider
                foreach ($products as $product) {
                   Inventory::create([
                        'provider_id' => $provider->id,
                        'product_id'  => $product->id,
                        'quantity'    => rand(5, 50),
                    ]);
                }
            });
    }
}
