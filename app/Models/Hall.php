<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    public $timestamps = false;
    protected $table = 'hall_customers';
    protected $fillable = [
        'name',
        'address',
        'phone_number'
    ];
}
