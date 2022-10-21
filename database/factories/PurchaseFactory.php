<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'delivery_address' => $this->faker->address(),
            'tracking_code' => $this->faker->word(),
            'status' => $this->faker->randomElement(['new', 'cancel', 'finish', 'prepare']),
            'payment_type' => $this->faker->randomElement(['cash', 'online'])
        ];
    }
}
