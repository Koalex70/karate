<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age_min',
        'age_max',
        'weight_min',
        'weight_max',
        'number_of_participants',
        'is_final',
        'map_id',
        'tournament_id'
    ];

    public function map()
    {
        return $this->belongsTo(Map::class);
    }

    public function competitions()
    {
        return $this->hasMany(Competition::class);
    }

    public function generateCategoryNet()
    {
        if ($this->number_of_participants < 2) {
            return; //TODO: сделать выброс исключения
        }

        if ($this->number_of_participants == 3) {
            Competition::factory()->create(['category_id' => $this->id, 'level' => 1]);
            Competition::factory()->create(['category_id' => $this->id, 'level' => 1]);
            Competition::factory()->create(['category_id' => $this->id, 'level' => 1]);

            return;
        }

        $numberOfLevels = $this->minPowerOfTwo($this->number_of_participants);

        //Гранд финал
        $rootCompetition = Competition::factory()->create(['category_id' => $this->id, 'level' => 1, 'is_final' => true]);
        $this->generateCategoryLevels($rootCompetition->id, 2, $numberOfLevels);

        //Соревнование за 3 место
        if ($this->number_of_participants >= 4) {
            Competition::factory()->create(['category_id' => $this->id, 'level' => 0, 'is_final' => false]);
        }
    }

    private function generateCategoryLevels($rootElementId, $level, $numberOfLevels): void
    {
        if ($level > $numberOfLevels) {
            return;
        }

        for ($i = 0; $i < 2; $i++) {
            $rootCompetition = Competition::factory()->create(['category_id' => $this->id, 'next_competition_id' => $rootElementId, 'level' => $level]);
            $this->generateCategoryLevels($rootCompetition->id, $level + 1, $numberOfLevels);
        }
    }

    public function getCategoryNet()
    {
        $countOfLevels = 1;

        while (pow(2, $countOfLevels) < $this->number_of_participants) {
            $countOfLevels++;
        }

        $result = [];

        while ($countOfLevels > 0) {
            $result[] = Competition::where('category_id', $this->id)
                ->where('level', $countOfLevels)
                ->get();

            $countOfLevels--;
        }

        return $result;
    }

    private function minPowerOfTwo($number) {
        if ($number < 1) {
            return 0;
        }

        $power = 0;
        while (pow(2, $power) < $number) {
            $power++;
        }

        return $power;
    }
}
