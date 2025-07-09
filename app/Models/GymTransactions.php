<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GymTransactions extends Model
{
public $timestamps = false;
protected $table = 'gym_transactions';
protected $fillable = [
'name',
'address',
'phone_number',
'email',
'gender',
'emergency_contact',
'membership_type',
'start_date',
'trainer_id',
'discount',
'entered_by'
];
}













