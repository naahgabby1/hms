<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staffpayment extends Model
{
    public $timestamps = false;
    protected $table = 'staff_payments';
    protected $fillable = ['category',
    'name',
    'phone_number',
    'period',
    'amount'];
}
