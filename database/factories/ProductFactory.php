<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'name' => $this->faker->unique()->sentence(),
            'info' => $this->faker->text($maxNbChars = 50),
            'price' =>  $this->faker->numberBetween($min = 500, $max = 700),
            'weight' => $this->faker->numberBetween($min = 300, $max = 499),
            // 'category_id' => $this->faker->unique()->sentence(),
            'category_id' => function () {
                return Category::all()->random();
            }
        ];
    }
}
