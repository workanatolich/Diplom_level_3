<?php

namespace App\Models;

use App\Exceptions\AccessDeniedException;
class AdminViewsManager extends ManagerModel{
    // Common links 

    public function render_page_links() {
        try {
            if($this->authHelper->is_admin()) {
                echo $this->engine->render("Admin/links", [
                    'style' => '/css/admin_links.css',
                    'title' => 'Links'
                ]);
            } else {
                throw new AccessDeniedException();
            }
        } catch (AccessDeniedException $e) {
            Helper::redirect_to("/");
        }
    }

    public function render_page_users() {   
        try {
            if($this->authHelper->is_admin()) {
                $users = $this->db->get_users();

                echo $this->engine->render("Admin/Users/users", [
                    'style' => '/css/admin_users.css',
                    'title' => 'Users',
                    'users' => $users
                ]);
            } else {
                throw new AccessDeniedException();
            }
        } catch (AccessDeniedException $e) {
            Helper::redirect_to("/");
        }
    }

    public function render_page_categories() {
        try {
            if($this->authHelper->is_admin()) {
                $categories = $this->db->get_all('categories'); 

                echo $this->engine->render("Admin/Categories/categories", [
                    'style' => '/css/admin_categories.css',
                    'title' => 'Categories',
                    'categories' => $categories
                ]);
            } else {
                throw new AccessDeniedException();
            }
        } catch (AccessDeniedException $e) {
            Helper::redirect_to("/");
        }
    }

    public function render_page_products() {
        try {
            if($this->authHelper->is_admin()) {
                $products = $this->db->get_all('products');

                echo $this->engine->render("Admin/products", [
                    'style' => '/css/admin_products.css',
                    'title' => 'Products',
                    'products' => $products,
                ]);
            } else {
                throw new AccessDeniedException();
            }
        } catch (AccessDeniedException $e) {
            Helper::redirect_to("/");
        }
    }

    public function render_page_reviews() {
        try {
            if($this->authHelper->is_admin()) {
                $reviews = $this->db->get_all('reviews');

                echo $this->engine->render("Admin/Reviews/reviews", [
                    'style' => '/css/admin_reviews.css',
                    'title' => 'Reviews',
                    'reviews' => $reviews
                ]);
            } else {
                throw new AccessDeniedException();
            }
        } catch (AccessDeniedException $e) {
            Helper::redirect_to("/");
        }
    }

    // links of special type

    public function render_page_category_create() {
        try {
            if($this->authHelper->is_admin()) {
                
                echo $this->engine->render("Admin/Categories/create", [
                    'title' => 'Create a category'
                ]);
            } else {
                throw new AccessDeniedException();
            }
        } catch (AccessDeniedException $e) {
            Helper::redirect_to("/");
        }        
    }

    public function render_page_category_edit($vars) {
        try {
            if($this->authHelper->is_admin()) {
                $category = $this->db->get_one_by_id('categories', $vars['category_id']);

                echo $this->engine->render("Admin/Categories/edit", [ 
                    'category' => $category,
                    'title' => 'Edit a category'
                ]);
            } else {
                throw new AccessDeniedException();
            }
        } catch (AccessDeniedException $e) {
            Helper::redirect_to("/");
        }        
    }

    public function render_page_user_create() {
        try {
            if($this->authHelper->is_admin()) {
                echo $this->engine->render("Admin/Users/create", [
                    'title' => 'Create a user'
                ]);
            } else {
                throw new AccessDeniedException();
            }
        } catch (AccessDeniedException $e) {
            Helper::redirect_to("/");
        }        
    }

    public function render_page_user_edit($vars) {
        try {
            if($this->authHelper->is_admin()) {
                $user = $this->db->get_one_by_id('users', $vars['user_id']);

                echo $this->engine->render("Admin/Users/edit", [
                    'user' => $user,
                    'title' => 'Edit a user'
                ]);
            } else {
                throw new AccessDeniedException();
            }
        } catch (AccessDeniedException $e) {
            Helper::redirect_to("/");
        }        
    }

    public function render_page_review_create() {
        try {
            if($this->authHelper->is_admin()) {
                $statuses = $this->db -> get_all('statuses');
                echo $this->engine->render("Admin/Reviews/create", [
                    'title' => 'Create a review',
                    'statuses' => $statuses
                ]);
            } else {
                throw new AccessDeniedException();
            }
        } catch (AccessDeniedException $e) {
            Helper::redirect_to("/");
        }        
    }

    public function render_page_review_edit($vars) {
        try {
            if($this->authHelper->is_admin()) {
                $statuses = $this->db -> get_all('statuses');
                $review = $this->db->get_one_by_id('reviews', $vars['review_id']);

                echo $this->engine->render("Admin/Reviews/edit", [
                    'review' => $review,
                    'title' => 'Edit a review',
                    'statuses' => $statuses
                ]);
            } else {
                throw new AccessDeniedException();
            }
        } catch (AccessDeniedException $e) {
            Helper::redirect_to("/");
        }        
    }
}