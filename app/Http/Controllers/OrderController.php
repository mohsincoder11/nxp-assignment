<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreOrderRequest;
use App\Services\OrderService;

class OrderController extends Controller
{
    protected $orders;

    public function __construct(OrderService $orders)
    {
        $this->orders = $orders;
    }

    public function store(StoreOrderRequest $request)
    {
        $payload = $request->validated();

        // In real app, you'd get provider from auth: $provider = auth()->user()->provider;
        $order = $this->orders->createOrder($payload);

        return response()->json([
            'success' => true,
            'order' => $order->load('items.product'),
        ], 201);
    }
}
