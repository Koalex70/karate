<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Federation extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%");
    }

    public function clubs(): HasMany
    {
        return $this->hasMany(Club::class, 'federation_id');
    }
}
