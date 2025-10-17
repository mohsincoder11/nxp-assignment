<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Services\OrderService;
use App\Traits\ApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderController extends Controller
{
    use ApiResponse;
    use AuthorizesRequests;
    protected $orders;

    public function __construct(OrderService $orders)
    {
        $this->orders = $orders;
    }

    public function store(StoreOrderRequest $request)
    {

        $user = auth()->user();

        // // Authorize the action
        $this->authorize('create', Order::class);

        $payload = $request->validated();

        // // Set provider_id automatically from the logged-in user
         $payload['provider_id'] = $user->provider_id;
         $payload['user_id'] = $user->id;

        $order = $this->orders->createOrder($payload);


        return $this->successResponse([
            'order' => $order,
        ], 'order successfull', 201);
    }
}
