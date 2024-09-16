<?php

namespace Database\Factories;

use App\Models\Federation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city' => $this->faker->city(),
            'federation_id' => Federation::factory()->sequence(fn(Sequence $sequence) => ['name' => 'Федерация для клуба ' . $sequence->index])
        ];
    }
}
