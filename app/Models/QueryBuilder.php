<?php

namespace App\Models;

use App\Models\SqlBuilder;
class QueryBuilder extends SqlBuilder 
{
    public function get_all($table) {
        $result = $this->build_query('select', $table, '*', 'all');
        return $result;
    }

    public function get_all_by_category_id($table, $category_id) {
        $result = $this->build_query('select', $table, '*', 'all', [
            'where' => 'category_id = :category_id',
            'bindValues' => ['category_id' => $category_id]
        ]);
        return $result;
    }

    public function get_all_by_user_id($table, $user_id) {
        $result = $this->build_query('select', $table, '*', 'all', 
        [   
            'where'=> 'user_id = :user_id',
            'bindValues' => ['user_id' => $user_id] 
        ]);

        return $result;
    }

    public function get_all_with_pagination($table, $pageCount, $page) {
        $result = $this->build_query('select', $table, '*', 'all', 
        [
            'where' => 'status_id = :status_id',
            'bindValues' => ['status_id' => 1],
            'setPaging' => $pageCount,
            'page' => $page

        ]);
        return $result;
    }

    public function get_products_with_pagination_by_category_title($category_title, $pageCount, $page) {
        $products = $this->build_query('select', 'categories as c', '*', 'all', [
            'join' => ['join_type' => 'left', 'join_table' => 'products as p', 'join_expression' => 'p.category_id = c.id'],
            'where' => ['c.title = :title', 'p.status_id = :status_id'],
            'bindValues' => ['title' => $category_title, 'status_id' => 1],
            'setPaging' => $pageCount,
            'page' => $page
        ]);
        return $products;
    }

    public function get_reviews_by_product_id($product_id) {
        $reviews = $this->build_query('select', 'reviews', '*','all', 
        [
            'where' => ['product_id = :product_id', 'status_id = :status_id'],
            'bindValues' => ['product_id' => $product_id, 'status_id' => 1]
        ]);

        return $reviews;
    }

    public function get_users() {
        $users = $this->build_query('select', 'users', ['id', 'username', 'email', 'roles_mask'], 'all');
        return $users; 
    }

  



    public function get_one_by_id($table, $id) {
        $result = $this->build_query('select', $table, '*', 'one', 
        [
            'where' => 'id = :id', 
            'bindValues' => ['id' => $id]
        ]);
        return $result;
    }

    public function get_one_by_user_id($table, $user_id) {
        $result = $this->build_query('select', $table, '*', 'one', 
        [
            'where' => 'user_id = :user_id',
            'bindValues' => ['user_id' => $user_id]
        ]);

        return $result;
    }

    public function get_image_path($product_id) {
        $path = $this->build_query('select', 'products', ['image'], 'one', 
        [
            'where' => 'id = :id', 
            'bindValues' => ['id' => $product_id]
        ]);

        return $path['image'];
    }





    public function get_count($table) {
        $count = $this->build_query('select', $table, ['COUNT(*)'], 'all');
        return $count[0]["COUNT(*)"];
    }

    public function get_count_products_by_category($category_title) {
        $count = $this->build_query('select', 'categories as c', ['COUNT(*)'], 'all', 
        [
            'join' => ['join_type' => 'left', 
                       'join_table' => 'products as p', 
                       'join_expression' => 'p.category_id = c.id'],
            'where' => 'c.title = :title',
            'bindValues' => ["title => $category_title"]
        ]);
        return $count[0]["COUNT(*)"];
    }
    
    
    
    
    
    public function add($table, $data) {
        $this->build_query('insert', $table, $data);
    }

    public function update($table, $id, $data) {
        $this->build_query('update', $table, $data, null, 
        [
            'where' => 'id = :id',
            'bindValues' => ['id' => $id]
        ]);
    }





    public function delete($table, $id) {
        $this->build_query('delete', $table, null, null, 
        [
            'where' => 'id = :id',
            'bindValues' => ['id' => $id]
        ]);
    }

    public function delete_reviews_by_product_id($product_id) {
        $this->build_query('delete', 'reviews', null, null, 
        [
            'where' => 'product_id = :id',
            'bindValues' => ['id' => $product_id]
            
        ]);
    } 
}