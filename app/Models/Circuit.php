<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}