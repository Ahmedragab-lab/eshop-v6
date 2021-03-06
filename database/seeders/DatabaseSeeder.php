<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        // $this->call(SectionSeeder::class);
        // $this->call(ProductSeeder::class);
        \App\Models\User::factory(10)->create();
        \App\Models\Section::factory(6)->create();
        \App\Models\Product::factory(22)->create();
        \App\Models\HomeSlider::factory(3)->create();
    }
}
