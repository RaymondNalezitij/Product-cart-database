<?php

namespace Tests\Feature;

use App\Jobs\DeleteCartProduct;
use App\Jobs\EditCartProduct;
use App\Jobs\PutProductInCart;
use Tests\TestCase;

class CartProductTest extends TestCase
{
    public function test_Adding_item_to_cart()
    {
        $test = new PutProductInCart(1, 1, 20, 40);
        $test->handle();

        $this->assertDatabaseHas('carts', [
            'userId' => 1,
            'productId' => 1,
            'quantity' => 20,
            'totalPrice' => 80000
        ]);
    }

    public function test_editing_item_in_cart()
    {
        $test = new EditCartProduct(30, 1);
        $test->handle();

        $this->assertDatabaseHas('carts', [
            'userId' => 1,
            'productId' => 1,
            'quantity' => 30,
            'totalPrice' => 120000
        ]);
    }

    public function test_delete_item_from_cart()
    {
        $test = new DeleteCartProduct(1);
        $test->handle();

        $this->assertDatabaseCount('carts', 0);
    }
}
