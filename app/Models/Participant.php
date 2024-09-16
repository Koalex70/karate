<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'date_of_birth',
        'weight',
        'club_id',
        'trainer_id',
        'rank_id',
        'user_id'
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }
}
