<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'surname',
      'patronymic',
      'club_id',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public static function getTrainerFullName($trainerId)
    {
        $trainer = Trainer::find($trainerId);

        return $trainer->surname . ' ' . $trainer->name . ' ' . $trainer->patronymic;
    }
}
