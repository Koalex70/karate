<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age_min',
        'age_max',
        'weight_min',
        'weight_max',
        'number_of_participants',
        'map_id',
    ];

    public function map()
    {
        return $this->belongsTo(Map::class);
    }

    public function generateTournamentNet()
    {
        if ($this->number_of_participants < 2) {
            return; //TODO: сделать выброс исключения
        }

        $numberOfLevels = $this->minPowerOfTwo($this->number_of_participants);

        //Гранд финал
        $rootCompetition = Competition::factory()->create(['tournament_id' => $this->id, 'level' => 1]);
        $this->generateTournamentLevels($rootCompetition->id, 2, $numberOfLevels);
    }

    private function generateTournamentLevels($rootElementId, $level, $numberOfLevels): void
    {
        if ($level > $numberOfLevels) {
            return;
        }

        for ($i = 0; $i < 2; $i++) {
            $rootCompetition = Competition::factory()->create(['tournament_id' => $this->id, 'next_competition_id' => $rootElementId, 'level' => $level]);
            $this->generateTournamentLevels($rootCompetition->id, $level + 1, $numberOfLevels);
        }
    }

    public function getTournamentNet()
    {
        $countOfLevels = 1;

        while (pow(2, $countOfLevels) < $this->number_of_participants) {
            $countOfLevels++;
        }

        $result = [];

        while ($countOfLevels > 0) {
            $result[] = Competition::where('tournament_id', $this->id)
                ->where('level', $countOfLevels)
                ->get();

            $countOfLevels--;
        }

        return $result;
    }

    private function minPowerOfTwo($number) {
        if ($number < 1) {
            return 0; // Для чисел меньше 1, возвращаем 0 (2^0 = 1)
        }

        $power = 0;
        while (pow(2, $power) < $number) {
            $power++;
        }

        return $power;
    }
}
