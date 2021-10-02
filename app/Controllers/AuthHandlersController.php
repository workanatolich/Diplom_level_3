<?php

namespace App\Controllers;
class AuthHandlersController extends Controller {
    public function logout() {
        $this->authManager -> logout();
    }

    public function logger() {
        $this->authManager -> login();
    }

    public function register(){
        $this->authManager -> register();
    }

    public function confirmer_email() {
        $this->authManager ->confirm_email();
    }

}