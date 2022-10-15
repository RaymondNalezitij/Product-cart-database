<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreProduct implements ShouldQueue
{

    private string $name;
    private int $quantity;
    private string $price;

    public function __construct(string $name, int $quantity, string $price)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function handle(): void
    {
        $newProduct = new Product([
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price' => $this->price * 100,
        ]);
        $newProduct->save();
    }
}
