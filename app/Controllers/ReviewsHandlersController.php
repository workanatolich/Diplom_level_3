<?php

namespace App\Controllers;

class ReviewsHandlersController extends Controller{
    public function review_creator($vars) {
        $this->reviewManager->create($vars);
    }

    public function review_editor($vars) {
        $this->reviewManager->edit($vars);
    }

    public function review_deletor($vars) {
        $this->reviewManager->delete($vars);
    }
}