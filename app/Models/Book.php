<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;
    protected $table = 'booking_reservation';
    protected $fillable = [
        'first_name', 'last_name', 'mobile_number', 'gender',
        'date_from', 'date_to', 'country', 'city',
        'room_type_id', 'room_id', 'address', 'entered_by'
    ];
}
