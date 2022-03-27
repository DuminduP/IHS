<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grievance>
 */
class GrievanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => substr($this->faker->uuid(),0,5),
            'title' => $this->faker->text(50),
            'description' => $this->faker->paragraph(),
            'institution_id' => $this->faker->numberBetween(1,40),
            'grievance_type_id' => $this->faker->numberBetween(1,14),
            'grievance_owner_id' => $this->faker->numberBetween(1,20),
            'status' => $this->faker->randomElement(['Open', 'In-prograss', 'Done', 'In-prograss']),
            'created_at' => $this->faker->dateTimeThisYear('today'),
        ];
    }
}
