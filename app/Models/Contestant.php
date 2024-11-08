<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    use HasFactory;

    protected $fillable = [
        'points',
        'is_winner',
        'position',
        'competition_id',
        'participant_id'
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
