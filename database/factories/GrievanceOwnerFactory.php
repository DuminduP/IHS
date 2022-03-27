<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GrievanceOwner>
 */
class GrievanceOwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'grievance_id' => $this->faker->numberBetween(1,40),
        'name' => $this->faker->name(),
        'mobile' => '07'.$this->faker->randomNumber(8, true),
        'mobile' => '07'.$this->faker->randomNumber(8, true),
        'user_agent' => $this->faker->userAgent(),
        'ip' => $this->faker->localIpv4(),
        ];
    }
}
