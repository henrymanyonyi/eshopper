<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'service_name' => $this->faker->name(),
            'rate_per_hour' => $this->faker->numberBetween(100,1000),
            'posting_user_id' => $this->faker->numberBetween(1,10),
            'service_category_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
