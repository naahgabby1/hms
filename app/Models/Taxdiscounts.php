<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taxdiscounts extends Model
{
    public $timestamps = false;
    protected $table = 'vat_discount';
    protected $fillable = [
        'vat_amount',
        'discount_amount'
    ];
}
