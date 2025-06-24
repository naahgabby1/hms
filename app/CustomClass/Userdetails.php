<?php

namespace App\CustomClass;
use Illuminate\Support\Facades\Auth;
class Userdetails {
protected $user;
public function __construct(){
$this->user = Auth::guard('logindetails')->check() ? Auth::guard('logindetails')->user() : null;
}

public function name() {
return $this->user?->user_name;
}


public function username() {
return $this->user?->email;
}


public function userrole() {
return $this->user?->role_description;
}

public function user_role() {
return $this->user?->user_role;
}

}
