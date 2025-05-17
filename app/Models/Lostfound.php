<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lostfound extends Model
{
    public $timestamps = false;
    protected $table = 'lostandfound';
    protected $fillable = ['item_description','summary','comments','status','date_delivered'];

} 	
