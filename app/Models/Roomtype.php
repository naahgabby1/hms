<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    public $timestamps = false;
    protected $table = 'room_type';
    protected $fillable = [
        'alias',
        'description'
    ];
}
