<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expensetype extends Model
{
     public $timestamps = false;
    protected $table = 'expenses';
    protected $fillable = [
        'expenses_type', 'description'
    ];
}
