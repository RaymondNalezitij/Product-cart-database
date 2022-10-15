<?php

namespace App\Jobs;

use App\Models\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;


class EditCartProduct implements ShouldQueue
{
    private int $cartId;
    private int $quantity;

    public function __construct(int $quantity, int $cartId)
    {
        $this->cartId = $cartId;
        $this->quantity = $quantity;
    }

    public function handle(): void
    {
        $orderDetails = Cart::where('id', $this->cartId)->get('*');
        $totalPrice = $orderDetails[0]['totalPrice'] / $orderDetails[0]['quantity'];

        Cart::where('id', $this->cartId)->update([
            'quantity' => $this->quantity,
            'totalPrice' => $this->quantity * $totalPrice
        ]);
    }
}
