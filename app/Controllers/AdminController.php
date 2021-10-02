<?php 

namespace App\Controllers;
class AdminController extends Controller {
    public function admin() {
        $this->adminViewsManager->render_page_links();
    }

    public function admin_products() {
        $this->adminViewsManager->render_page_products();
    }




    public function admin_users() {
        $this->adminViewsManager->render_page_users();
    }

    public function admin_user_create() {
        $this->adminViewsManager->render_page_user_create();
    }
    
    public function admin_user_edit($vars) {
        $this->adminViewsManager->render_page_user_edit($vars);
    }
    
    public function admin_user_view($vars) {
        $this->adminViewsManager->render_page_user_view($vars);
    }
    



    public function admin_categories() {
        $this->adminViewsManager->render_page_categories();
    }

    public function admin_category_create() {
        $this->adminViewsManager->render_page_category_create();
    }
    
    public function admin_category_edit($vars) {
        $this->adminViewsManager->render_page_category_edit($vars);
    }
    



    public function admin_reviews() {
        $this->adminViewsManager -> render_page_reviews();
    }

    public function admin_review_create() {
        $this->adminViewsManager->render_page_review_create();
    }
    
    public function admin_review_edit($vars) {
        $this->adminViewsManager->render_page_review_edit($vars);
    } 
}