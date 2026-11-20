<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Circuit extends Model
{
    protected $fillable = [
        'circuit_name',
        'country',
        'circuit_length',
        'number_of_turns',
        'lap_record',
        'circuit_image',
    ];

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}