<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps = false;
    protected $table = 'room';
    protected $fillable = [
        'description',
        'type_id',
        'fee',
        'fee_double',
        'availability',
        'present_or_future',
        'booking_code',
    ];

     public function rooms_type_name(){
          return $this->belongsTo(Roomtype::class, 'type_id', 'id');
        }

}
