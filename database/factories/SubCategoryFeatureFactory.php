<?php

namespace Database\Factories;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'feature_name' => $this->faker->name(),
            'sub_category_id' => SubCategory::inRandomOrder()->first()->id,
        ];
    }
}
