<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participant>
 */
class ParticipantFactory extends Factory
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
            'date_of_birth' => $this->faker->dateTime(),
            'weight' => $this->faker->numberBetween(80, 120),
            'trainer_id' => $this->faker->numberBetween(1, 20),
            'rank_id' => $this->faker->numberBetween(1, 17),
            'club_id' => $this->faker->numberBetween(22, 40),
            'user_id' => User::factory()
        ];
    }
}
