<?php

namespace App\Models;

use Nette\Utils\Validators;

use App\Exceptions\InvalidCategoryException;
use App\Exceptions\InvalidTitleException;
class CategoryManager extends ManagerModel{    
    public function create() {
        try {
            if(Validators::isUnicode($_POST['title'])) {
                $data = ['title' => $_POST['title']];
                $this->db->add('categories', $data);
                flash()->success("A category with title '{$_POST['title']}' succefully added");
                Helper::redirect_to("/admin/categories"); 
            } else {throw new InvalidTitleException;}

        } catch (InvalidTitleException $e) {
            flash()->error('Your title has been rejected');
            Helper::redirect_to("/admin/category/create");
        }
    }

    public function edit($vars) {
        try {
            if(Validators::isNumericInt($vars['category_id'])) {
                if(Validators::isUnicode($_POST['title'])) {
                    $data = ['title' => $_POST['title']];
                } else {throw new InvalidTitleException;}

                $this->db->update('categories', $vars['category_id'], $data);
                flash()->success("A category with title '{$_POST['title']}' succefully updated");
                Helper::redirect_to("/admin/categories");

            } else {throw new InvalidCategoryException;}

        } catch (InvalidTitleException $e) {
            flash()->error('Your title has been rejected');
            Helper::redirect_to("/admin/category/edit/{$vars['category_id']}");

        } catch (InvalidCategoryException $e) {
            flash()->error('There is something wrong with category');
            Helper::redirect_to("/admin/category/edit/{$vars['category_id']}");
        }
    }

    public function delete($vars) {
        try {
            if(Validators::isNumericInt($vars['category_id'])) {
                if($vars['category_id'] != 1) {
                    $products = $this->db->get_all_by_category_id('products', $vars['category_id']);
                    
                    foreach($products as $product) {
                        $product['category_id'] = 1;
                        $this->db->update('products', $product['id'], $product);
                    }

                    $this->db->delete('categories', $vars['category_id']);
                    flash()->success("A category with id '{$vars['category_id']}' succefully deleted");
                    Helper::redirect_to("/admin/categories");
                } else {throw new DefaultCategoryException;}
                
            } else {throw new InvalidCategoryException;}

        } catch (InvalidCategoryException $e) {
            flash()->error('There is something wrong with category');
            Helper::redirect_to("/admin/categories");
        
        } catch (DefaultCategoryException $e) {
            flash()->error("You shouldn't delete the default category");
            Helper::redirect_to("/admin/categories");
        }
    }
   
}