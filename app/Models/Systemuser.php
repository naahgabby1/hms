<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Systemuser extends Model
{
    protected $table = 'users';
    protected $fillable = [
    'first_name',
    'last_names',
    'user_role',
    'email',
    'password'
];
}
