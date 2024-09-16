<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trainer>
 */
class TrainerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstNameMale(),
            'surname' => $this->faker->lastName(),
            'patronymic' => $this->faker->firstNameMale(),
            'club_id' => $this->faker->numberBetween(22, 40)
        ];
    }
}
