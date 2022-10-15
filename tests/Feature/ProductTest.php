<?php

namespace Tests\Feature;

use App\Jobs\DeleteProduct;
use App\Jobs\EditProduct;
use App\Jobs\StoreProduct;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_create_product()
    {
        $test = new StoreProduct('TestName', 10, 30);
        $test->handle();

        $this->assertDatabaseHas('products', [
            'name' => 'TestName',
            'quantity' => 10,
            'price' => 3000
        ]);
    }

    public function test_edit_product()
    {
        $test = new EditProduct(1, 'TestName', 20, 50);
        $test->handle();

        $this->assertDatabaseHas('products', [
            'name' => 'TestName',
            'quantity' => 20,
            'price' => 5000
        ]);
    }

    public function test_delete_product()
    {
        $test = new DeleteProduct(1);
        $test->handle();

        $this->assertSoftDeleted('products', [
            'id' => '1',
            'name' => 'TestName',
            'quantity' => 20,
            'price' => 5000
        ]);
    }
}
