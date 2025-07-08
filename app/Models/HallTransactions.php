<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HallTransactions extends Model
{
protected $table = 'hall_transactions';
public $timestamps = false;
protected $fillable = [
'client',
'organization_id',
'organization_name',
'phone_number',
'event_type',
'participants',
'date_of_event',
'start_date',
'end_date',
'catering_option',
'entered_by',
'payment_amount',
'status',
'payment_date',
'payment_receivedby',
];
}
