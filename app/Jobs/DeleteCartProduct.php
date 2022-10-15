<?php

namespace App\Jobs;

use App\Models\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteCartProduct implements ShouldQueue
{
    private int $cartId;

    public function __construct(int $cartId)
    {
        $this->cartId = $cartId;
    }

    public function handle(): void
    {
        Cart::where('id', $this->cartId)->forceDelete();
    }
}
