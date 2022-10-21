<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\SubCategoryFeature;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'sub_category_feature_id' => SubCategoryFeature::inRandomOrder()->first()->id,
            'value' => $this->faker->word()
        ];
    }
}
