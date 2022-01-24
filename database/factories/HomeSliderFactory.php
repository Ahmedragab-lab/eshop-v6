<?php

namespace Database\Factories;

use App\Models\HomeSlider;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomeSliderFactory extends Factory
{
    protected $model = HomeSlider::class;

    public function definition()
    {
        return [
            'title'=>$this->faker->text(50),
            'subtitle'=>$this->faker->text(100),
            'price'=>$this->faker->numberBetween(200,500),
            'link'=>'http://127.0.0.1:8000/shop',
            'image'=>'main-slider-2-' . $this->faker->numberBetween(1,3).'.jpg',
            'status'=>'1',
        ];
    }
}
