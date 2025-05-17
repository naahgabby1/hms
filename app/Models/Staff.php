<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Staff extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $table = 'staff';
    protected $dates = ['deleted_at'];
    protected $fillable = ['first_name',
    'last_name',
    'phone_number',
    'emergency_contact_name',
    'emergency_contact_number',
    'gender',
    'ghana_card','archived',
    'date_archived',
    'archived_reason'];

    protected static function booted()
{
    static::deleting(function ($model) {
        if (Auth::check()) {
            $model->deleted_by = Auth::guard('logindetails')->user()->email;
            $model->save();
        }
    });
}
public function deletedByUser()
{
    return $this->belongsTo(User::class, 'deleted_by');
}
}
