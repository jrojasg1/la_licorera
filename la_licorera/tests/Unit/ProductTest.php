<?php

namespace Tests\Unit;

use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $products = Product::all();
        $testProduct = $products[0];

        $this->get('/products')
            ->assertSee($testProduct->getName())
            ->assertSee($testProduct->getType())
            ->assertSee($testProduct->getPrice());
    }
}
