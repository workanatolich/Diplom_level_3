<?php

namespace App\Controllers;

class ErrorPagesController extends Controller
{
    public function page_not_found() {
        echo $this->engine->render('Errors/page_not_found');
    }

    public function method_not_allowed() {
        echo $this->engine->render('Errors/method_not_allowed');
    }
}