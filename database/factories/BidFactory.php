<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bid>
 */
class BidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bidding_user_id' => $this->faker->numberBetween(1,10),
            'item_id' => $this->faker->numberBetween(1,10),
            'posting_user_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
