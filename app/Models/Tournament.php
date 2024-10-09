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
}
