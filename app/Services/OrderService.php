<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Inventory;
use App\Events\OrderPlaced;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function createOrder(array $data)
    {
        return DB::transaction(function () use ($data) {
            $providerId = $data['provider_id'];
            $items = $data['items'];

            // Calculate totals and validate stock
            $total = 0;
            $order = Order::create([
                'provider_id' => $providerId,
                'total_amount' => 0,
            ]);

            foreach ($items as $it) {
                $productId = $it['product_id'];
                $qty = $it['quantity'];

                $inventory = Inventory::where('provider_id', $providerId)
                    ->where('product_id', $productId)
                    ->lockForUpdate()
                    ->first();

                if (!$inventory || $inventory->quantity < $qty) {
                    throw new \Exception("Insufficient stock for product id {$productId}");
                }

                $product = $inventory->product;
                $unitPrice = $product->price;
                $lineTotal = $unitPrice * $qty;

                // create order item
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $qty,
                    'unit_price' => $unitPrice,
                    'line_total' => $lineTotal,
                ]);

                // decrement inventory
                $inventory->decrement('quantity', $qty);

                $total += $lineTotal;
            }

            $order->update(['total_amount' => $total]);

            // dispatch event
            OrderPlaced::dispatch($order);

            return $order->fresh('items.product');
        });
    }
}
