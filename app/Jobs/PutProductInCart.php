<?php

namespace App\Jobs;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;

class PutProductInCart implements ShouldQueue
{

    private string $userId;
    private int $productId;
    private int $quantity;
    private int $price;

    public function __construct(string $userId, int $productId, int $quantity, int $price)
    {
        $this->userId = $userId;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function handle(): void
    {
        $cart = new Cart([
            'userId' => $this->userId,
            'productId' => $this->productId,
            'quantity' => $this->quantity,
            'totalPrice' => $this->price * $this->quantity * 100,
        ]);
        $cart->save();
    }
}
