<?php

namespace App\Models;

use Delight\Auth\Auth;

class AuthHelper {
    private $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function is_admin() {
        if($this->auth->hasRole(\Delight\Auth\Role::ADMIN)) {
            return true;
        } else {
            return false;
        }
    }

    public function is_logged_in() {
        if($this->auth->isLoggedIn()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_user_id() {
        return $this->auth->getUserId();
    }
}