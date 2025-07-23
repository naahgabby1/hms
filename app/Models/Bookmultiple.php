<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmultiple extends Model
{
    public $timestamps = false;
    protected $table = 'booking_multiple';
    protected $fillable = [
        'occupancy', 'booking_id', 'first_name', 'last_names', 'gender',
        'phone_number',
        'room_type', 'room'
    ];
}
