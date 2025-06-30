<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GymTransactions extends Model
{
    // public $timestamps = false;
    protected $table = 'gym_transactions';
    protected $fillable = [
        'customer'
    ];
}
