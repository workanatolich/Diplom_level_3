<?php

namespace App\Controllers;

class AuthController extends Controller
{
    public function login() {
        echo $this->engine->render('Auth/login');
    }

    public function registration() {
        echo $this->engine->render('Auth/registration');
    }

    public function confirm_email() {
        echo $this->engine->render('Auth/confirm_email');
    }

}