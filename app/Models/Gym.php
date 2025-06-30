<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    public $timestamps = false;
    protected $table = 'gym_customers';
    protected $fillable = [
        'name',
        'address',
        'phone_number'
    ];
}
