<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use WithFaker;
    public function test_create_product_by_factory()
    {
        $product = Product::factory(Product::class)->create();//goi factory de tao moi du lieu
        $this->assertNotNull($product);//kiem tra ket qua tra ve co NULL hay khong
        $this->assertInstanceOf(Product::class, $product);
    }
    public function test_update_product()
    {
        $product = Product::where('id','>',1)->first();
        $product->name = fake()->name;
        $product->isbn = random_int(8, PHP_INT_MAX);
        $product->author_id = fake()->numberBetween($min = 1, $max = 5);
        $product->category_id = fake()->numberBetween($min = 1, $max = 5);
        $product->page = rand(100,200);
        $product->year = fake()->numberBetween($min = 1990, $max = 2022);
        $this->assertTrue($product->save());
    }
    public function test_delete_product()
    {
        $product = Product::where('id','>',1)->first();//lay ket qua cuoi cung
        $this->assertTrue($product->delete());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
}