<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lostandfound extends Model
{
    public $timestamps = false;
    protected $table = 'lostandfound';
    protected $fillable = [
        'lostarea',
        'area_room_found',
        'itemqty',
        'item_description',
        'found_by',
        'summary',
        'comments',
        'status',
        'delivered_by',
        'remarks_on_delivery',
        'date_delivered',
    ];
}
