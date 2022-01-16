<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=2,$asText=true);
        $slug = Str::slug($product_name);

        return [
            'product_name'=>$product_name,
            'slug'=>$slug,
            'small_desc'=>$this->faker->text(200),
            'desc'=>$this->faker->text(500),
            'original_price'=>$this->faker->numberBetween(10,500),
            'SKU'=>'DIGI'.$this->faker->unique()->numberBetween(10,500),
            'stock'=>'instock',
            'qty'=>$this->faker->numberBetween(100,200),
            'image'=>'digital_' . $this->faker->numberBetween(10,22).'.jpg',
            'section_id'=>$this->faker->numberBetween(1,5),


            // 'selling_price'=>$this->faker->numberBetween(10,500),
            // 'featured'=>$this->faker->text(200),
        ];
    }
}
