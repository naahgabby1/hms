<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $timestamps = false;
    protected $table = 'expenses_payments';
    protected $fillable = [
        'exp_type', 'comments', 'amount', 'entered_by'
    ];
}
