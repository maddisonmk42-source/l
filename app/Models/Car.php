<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'car_number',
        'model',
        'production_year',
        'engine',
        'team',
        'photo',
        'description',
    ];
}