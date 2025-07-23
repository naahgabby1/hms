<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GymPayments extends Model
{
public $timestamps = false;
protected $table = 'gym_payments';
protected $fillable = [
'customer_id',
'customer_name',
'amount',
'paid_to'
];
}
