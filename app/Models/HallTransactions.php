<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HallTransactions extends Model
{
    protected $table = 'hall_transactions';
    protected $fillable = [
        'customer'
    ];
}
