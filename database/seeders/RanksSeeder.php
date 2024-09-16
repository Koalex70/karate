<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ranks')->insert(['name' => 'Без Кю - Белый пояс', 'rank' => 0]);
        DB::table('ranks')->insert(['name' => '11 Кю - Белый пояс с оранжевой полоской', 'rank' => 1]);
        DB::table('ranks')->insert(['name' => '10 Кю - Оранжевый пояс', 'rank' => 2]);
        DB::table('ranks')->insert(['name' => '9 Кю - Оранжевый пояс с синий полоской', 'rank' => 3]);
        DB::table('ranks')->insert(['name' => '8 Кю - Синий пояс', 'rank' => 4]);
        DB::table('ranks')->insert(['name' => '7 Кю - Синий пояс с желтой полоской', 'rank' => 5]);
        DB::table('ranks')->insert(['name' => '6 Кю - Желтый пояс', 'rank' => 6]);
        DB::table('ranks')->insert(['name' => '5 Кю - Желтый пояс с зеленой полоской', 'rank' => 7]);
        DB::table('ranks')->insert(['name' => '4 Кю - Зеленый пояс', 'rank' => 8]);
        DB::table('ranks')->insert(['name' => '3 Кю - Зеленый пояс с коричневой полоской', 'rank' => 9]);
        DB::table('ranks')->insert(['name' => '2 Кю - Коричневый пояс', 'rank' => 10]);
        DB::table('ranks')->insert(['name' => '1 Кю - Коричневый пояс с золотой полоской', 'rank' => 11]);
        DB::table('ranks')->insert(['name' => '1 Дан', 'rank' => 12]);
        DB::table('ranks')->insert(['name' => '2 Дан', 'rank' => 13]);
        DB::table('ranks')->insert(['name' => '3 Дан', 'rank' => 14]);
        DB::table('ranks')->insert(['name' => '4 Дан', 'rank' => 15]);
        DB::table('ranks')->insert(['name' => '5 Дан', 'rank' => 16]);
        DB::table('ranks')->insert(['name' => '6 Дан', 'rank' => 17]);

    }
}
