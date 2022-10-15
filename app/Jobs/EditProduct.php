<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;

class EditProduct implements ShouldQueue
{

    private int $productId;
    private string $productName;
    private int $productQuantity;
    private int $productPrice;

    public function __construct(int $productId, string $productName, int $productQuantity, int $productPrice)
    {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productQuantity = $productQuantity;
        $this->productPrice = $productPrice;
    }

    public function handle(): void
    {
        Product::where('id', $this->productId)->update([
            'name' => $this->productName,
            'quantity' => $this->productQuantity,
            'price' => $this->productPrice * 100,
        ]);
    }
}
