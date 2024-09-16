<?php

namespace Database\Seeders;

use App\Models\Federation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class FederationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Federation::factory()
            ->count(10)
            ->sequence(fn(Sequence $sequence) => ['name' => $sequence->index . ' Федерация'])
            ->create();
    }
}
