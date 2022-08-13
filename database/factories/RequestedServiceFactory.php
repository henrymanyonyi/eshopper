<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestedService>
 */
class RequestedServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'service_id' => $this->faker->numberBetween(1,10),
           'requesting_user_id' => $this->faker->numberBetween(1,10),
           'posting_user_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
