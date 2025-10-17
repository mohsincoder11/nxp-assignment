<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Gate;
use Mockery;
use Tests\TestCase;

class OrderApiTest extends TestCase
{
    use RefreshDatabase;

    protected string $endpoint = '/api/orders';

    /** @test */
    public function it_requires_authentication_to_create_order()
    {
        $response = $this->postJson($this->endpoint, [
            'items' => [['product_id' => 1, 'quantity' => 2]],
        ]);

        $response->assertStatus(401);
    }

    /** @test */
    public function authorized_user_can_create_order_with_items()
    {
        $provider = Provider::factory()->create();
        $user = User::factory()->create(['provider_id' => $provider->id]);

        $product = Product::factory()->create();

        // Mock the repository or service
        $mock = Mockery::mock('App\Services\OrderService');
        $this->app->instance('App\Services\OrderService', $mock);

        // Expect the createOrder() method to be called once
        $mock->shouldReceive('createOrder')
            ->once()
            ->andReturn(
                Order::factory()->make([
                    'id' => 1,
                    'provider_id' => $provider->id,
                    'user_id' => $user->id,
                    'total_amount' => 500,
                    'status' => 'pending',
                ])
            );

        // Mock authorization
        Gate::shouldReceive('authorize')
            ->with('create', \App\Models\Order::class)
            ->andReturn(true);

        $payload = [
            'items' => [
                [
                    'product_id' => $product->id,
                    'quantity' => 6,
                ]
            ],
        ];

        $response = $this->actingAs($user)->postJson($this->endpoint, $payload);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'message',
                'data' => [
                    'order' => [
                        'id',
                        'provider_id',
                        'user_id',
                        'status',
                    ],
                ],
            ])
            ->assertJsonFragment([
                'provider_id' => $provider->id,
                'user_id' => $user->id,
                'status' => 'pending',
            ]);
    }

    /** @test */
    public function unauthorized_user_cannot_create_order()
    {
        $provider = Provider::factory()->create();
        $user = User::factory()->create(['provider_id' => $provider->id]);

        $product = Product::factory()->create();

        Gate::shouldReceive('authorize')
            ->with('create', \App\Models\Order::class)
            ->andThrow(new \Illuminate\Auth\Access\AuthorizationException);

        $payload = [
            'items' => [
                [
                    'product_id' => $product->id,
                    'quantity' => 2,
                ]
            ],
        ];

        $response = $this->actingAs($user)->postJson($this->endpoint, $payload);

        $response->assertStatus(403);
    }
}
