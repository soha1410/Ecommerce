<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'sub_category_id' => SubCategory::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id,
            'img' => $this->faker->imageUrl(),
            'visibility' => $this->faker->boolean(80),
            'is_in_top_list' => $this->faker->boolean(10),
            'priority' => $this->faker->numberBetween(1, 10),
            'off' => $this->faker->numberBetween(1000, 100000),
            'available_count' => $this->faker->numberBetween(10, 100),
        ];
    }
}
