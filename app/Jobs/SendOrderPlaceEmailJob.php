<?php

namespace App\Jobs;

use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendOrderPlaceEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public Order $order;

    /**
     * Create a new job instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Determine recipient — adjust this to your model structure
        $recipient = $this->order->user->email ?? null;

        if (!$recipient) {
            \Log::warning("No recipient email for Order ID {$this->order->id}");
            return;
        }

        // Send email
        Mail::to($recipient)->send(new OrderConfirmationMail($this->order));


        \Log::info("Order placed email sent for Order ID: {$this->order->id}");
    }
}
