<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
public $timestamps = false;
protected $table = 'customers';
protected $fillable = [
'first_name', 'last_names', 'phone_number', 'gender',
'country', 'address','personal_or_coporate'
];
}
