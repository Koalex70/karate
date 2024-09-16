<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\Federation;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Club::factory()
            ->count(20)
            ->sequence(fn(Sequence $sequence) => [
                'name' => $sequence->index . ' Клуб',
                'federation_id' => Federation::factory()->create(['name' => 'Федерация для клуба ' . $sequence->index])
            ])
            ->create();
    }
}
