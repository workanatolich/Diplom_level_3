<?php

namespace App\Controllers;

class AdminHandlersController extends Controller{

    // Review
    public function review_create() {
        $this->reviewManager->create($_POST);
    }

    public function review_edit($vars) {
        $this->reviewManager->edit($vars);
    }

    public function review_delete($vars) {
        $this->reviewManager->delete($vars);
    }
    
    // Category
    public function category_create() {
        $this->categoryManager->create();
    }

    public function category_edit($vars) {
        $this->categoryManager->edit($vars);
    }

    public function category_delete($vars) {
        $this->categoryManager->delete($vars);
    }

    // User
    public function user_create() {
        $this->userManager->create();
    }

    public function user_edit($vars) {
        $this->userManager->edit($vars);
    }
    
    public function user_delete($vars) {
        $this->userManager->delete($vars);
    }

}