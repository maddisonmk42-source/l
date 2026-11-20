<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'driver_name',
        'racing_number',
        'country',
        'date_of_birth',
        'team',
        'photo',
    ];
}