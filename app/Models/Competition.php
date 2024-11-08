<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = [
        'next_competition_id',
        'category_id',
        'competition_result_id',
        'level',
        'is_final',
    ];

    public function contestants() {
        return $this->hasMany(Contestant::class);
    }

    public function contestantParticipant()
    {
        return $this->hasThrough(Contestant::class, Participant::class);
    }
}
