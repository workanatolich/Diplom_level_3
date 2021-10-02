<?php

namespace App\Models;
use JasonGrimes\Paginator;
class ProductViewsManager extends ManagerModel{
    public function render_form_create() {
        if($this->auth->isLoggedIn()) {
            $categories = $this->db->get_all('categories');
            $statuses = $this->db->get_all('statuses');

            echo $this->engine->render('Products/create', [
                'categories' => $categories,
                'statuses' => $statuses,
                'authHelper' => $this->authHelper,
                'title' => 'Create a product'
            ]);
        } else {
            flash()->error('Please, sign in to add a product');
            Helper::redirect_to('/products/1');
        }
    }

    public function render_form_edit($vars) {
        if($this->auth->isLoggedIn()) {
            $categories = $this->db->get_all('categories');
            $statuses = $this->db->get_all('statuses');
            $product_id = $vars['product_id'];
            $product = $this->db->get_one_by_id('products', $product_id);

            echo $this->engine->render('Products/edit', [
                'product' => $product,
                'statuses'=> $statuses,
                'categories' => $categories,
                'authHelper' => $this->authHelper,
                'title' => 'Edit a product'
            ]);
        } else {
            flash()->error('Please, sign in to edit this product');
            Helper::redirect_to('/products/1');
        }
    }

    public function render_products_page() {

        $totalItems = $this->db->get_count('products');
        $itemsPerPage = 12;

        if(isset($vars['page'])) {
            $currentPage = $vars['page'];
        } else {
            $currentPage = 1;
        }

        $urlPattern = '/products/(:num)';

        $paginator = '';
        if($totalItems > $itemsPerPage) {
            $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        }

        $products = $this->db -> get_all_with_pagination('products', $itemsPerPage, $currentPage);
        $categories = $this->db -> get_all('categories');

        echo $this->engine->render('Products/products', [
            'products' => $products,
            'paginator' => $paginator,
            'categories' => $categories,
            'style'=> '/css/products.css',
            'title' => 'Products',
            'authHelper' => $this->authHelper]);
    }

    public function render_products_by_category($vars) {
        $category_title = $vars['category'];
        $totalItems = $this->db->get_count_products_by_category($category_title);
        $itemsPerPage = 12;


        if(isset($vars['page'])) {
            $currentPage = $vars['page'];
        } else {
            $currentPage = 1;
        }

        $paginator = '';
        $urlPattern = "/products/{$category_title}/(:num)";
        if($totalItems > $itemsPerPage) {
            $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        }

        $products = $this->db -> get_products_with_pagination_by_category_title($category_title, $itemsPerPage, $currentPage);
        $categories = $this->db -> get_all('categories');
        echo $this->engine->render('Products/products', [
            'products' => $products,
            'paginator' => $paginator,
            'categories' => $categories,
            'style'=>'/css/products.css',
            'title' => "Products by {$category_title}",
            'authHelper' => $this->authHelper]);
    }

    public function render_product_page($vars) {
        $user_id = $this->authHelper->get_user_id();
        $product = $this->db->get_one_by_id('products', $vars['id']);
        $categories = $this->db->get_all('categories');
        $reviews = $this->db->get_reviews_by_product_id($vars['id']);

        echo $this->engine->render('Products/product', [
            "user_id" => $user_id,
            'product' => $product,
            'reviews' => $reviews,
            'categories' => $categories,
            'title' => "{$product['title']}",
            'style' => ['/css/product.css','/css/uicons-regular-rounded.css'],
            'js' => '/js/product.js',
            'authHelper' => $this->authHelper]);
    }

}