<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viewbooking extends Model
{
        public $timestamps = false;
        protected $table = 'vw_reservationbooking';
        protected $primaryKey = null;
        public $incrementing = false;

        public function rooms(){
          return $this->belongsTo(Room::class, 'room_id', 'id');
        }

        public function multiple_customers_fromview(){
          return $this->hasMany(Bookmultipleview::class, 'booking_id', 'id');
        }
}
