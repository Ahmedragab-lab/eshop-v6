<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        Product::create([
            'section_id' => '1',
            'product_name' => 'oppo',
            'slug' => 'oppo',
            'small_desc' => 'amazing mobile',
            'desc' => 'very beautiful design and high smart mobile',
            'original_price' => '5000',
            'selling_price' => '4500',
            'SKU' => 'oppo',
            'stock' => 'instock',
            'featured' => false,
            'qty' => '5',


        ]);
    }
}
