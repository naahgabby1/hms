<?php

namespace App\CustomClass;
use Illuminate\Support\Facades\Auth;
class Userroles {
protected $user;
public function __construct(){
$this->user = Auth::guard('logindetails')->check() ? Auth::guard('logindetails')->user() : null;
}

public function role() {
return [
'role_id' => $this->user?->user_role,
'role_name' => $this->user?->role_description,
];
}

// Admin
public function isAdmin() {
if ($this->role()['role_id']==1) {
return true;
}
return false;
}

// Manager
public function isManager() {
if ($this->role()['role_id']==2) {
return true;
}
return false;
}

// Attendant
public function isAttendant() {
if ($this->role()['role_id']==3) {
return true;
}
return false;
}

// Cleaner
public function isCleaner() {
if ($this->role()['role_id']==4) {
return true;
}
return false;
}

public function isEither(array $roles){
$role = $this->role()['role_id'];
if (in_array($role, $roles)) {
return true;
}
return false;
}
}
