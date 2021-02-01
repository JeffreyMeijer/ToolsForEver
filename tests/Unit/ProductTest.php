<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test to see if products get created
     *
     * @return void
    */

    public function test_createProducts()
    {
        $products = Product::factory()->count(5)->create();

        $this->assertEquals(count($products), 5);
    }

    /**
     * A basic test to see if a product get updated correctly
     *
     * @return void
    */
    public function test_editProduct()
    {
        $products = Product::factory()->count(5)->create();

        $this->assertEquals(count($products), 5);

        $product = $products->first();

        $product->update([
            'artikel' => 'Schroevendraaier',
            'voorraad' => '50',
        ]);

        $this->assertEquals($product->artikel, 'Schroevendraaier');
        $this->assertEquals($product->voorraad, '50');
    }

    /**
     * A basic test to see if a product gets deleted
     *
     * @return void
    */

    public function test_deleteProduct()
    {
        $products = Product::factory()->count(5)->create();

        $this->assertEquals(count($products), 5);

        $product = $products->first();

        $product->delete();

        $this->assertDeleted($product);
    }
}
