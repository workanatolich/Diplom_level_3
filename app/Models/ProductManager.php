<?php

namespace App\Models;

use Nette\Utils\Validators;

use App\Exceptions\InvalidCategoryException;
use App\Exceptions\InvalidDescriptionException;
use App\Exceptions\InvalidStatusException;
use App\Exceptions\InvalidTextException;
use App\Exceptions\InvalidTitleException;


class ProductManager extends ManagerModel{
    public function create() {
        try {
            $data = ['user_id' => $this->authHelper->get_user_id()];

            if(Validators::isUnicode($_POST['title'])) {
                $data += ['title' => $_POST['title']];
            } else {throw new InvalidTitleException;}           
            
            if(Validators::isUnicode($_POST['description'])) {
                $data += ['description' => $_POST['description']];
            } else {throw new InvalidDescriptionException();}           
            
            if(Validators::isUnicode($_POST['text'])) {
                $data += ['text' => $_POST['text']];
            } else {throw new InvalidTextException;}           
    
            if($_POST['category_id'] == "Choose...") {
                $data += [
                    'category_id' => 1
                ];
            } else if(Validators::isNumericInt($_POST['category_id'])) {
                $data += ['category_id' => $_POST['category_id']];
            } else {throw new InvalidCategoryException;}           
        
            if($_FILES['image']['size'] > 0) {
                $image = $this->imageManager->upload_image($_FILES['image']);
                $data += [
                    'image' => $image 
                ];
            } else {
                $image = '/img/default/product.png';
                $data += [
                    'image' => $image 
                ]; 
            }

            if($_POST['status_id'] == "Choose...") {
                $data += [
                    'status_id' => 1
                ];
            } else if(Validators::isNumericInt($_POST['status_id'])) {
                $data += ['status_id' => $_POST['status_id']];
            } else {throw new InvalidStatusException;} 

            $this->db->add('products', $data);

            flash()->success("A product with title '{$_POST['title']}' successfully added");
            if($this->authHelper->is_admin()) {
                Helper::redirect_to('/admin/products');
            } else {
                Helper::redirect_to('/');
            }

        } catch(InvalidTitleException $e) {
            flash()->error('Your title failed verification');
            Helper::redirect_to('/product/create');

        } catch(InvalidDescriptionException $e) {
            flash()->error('Your description failed verification');
            Helper::redirect_to('/product/create');

        } catch(InvalidTextException $e) {
            flash()->error('Your text failed verification');
            Helper::redirect_to('/product/create');

        } catch(InvalidCategoryException $e) {
            flash()->error('There is something wrong with category');
            Helper::redirect_to('/product/create');

        } catch(InvalidStatusException $e) {
            flash()->error('There is something wrong with status');
            Helper::redirect_to('/product/create');
        }
    }

    public function edit($vars) {
        try {
            $product_id = $vars['product_id'];
            $data = ['user_id' => $this->authHelper->get_user_id()];

            if(Validators::isUnicode($_POST['title'])) {
                $data += ['title' => $_POST['title']];
            } else {throw new InvalidTitleException;}           
            
            if(Validators::isUnicode($_POST['description'])) {
                $data += ['description' => $_POST['description']];
            } else {throw new InvalidDescriptionException();}           
            
            if(Validators::isUnicode($_POST['text'])) {
                $data += ['text' => $_POST['text']];
            } else {throw new InvalidTextException;}           
    
            if($_POST['category_id'] == "Choose...") {
                $data += [
                    'category_id' => 1
                ];
            } else if(Validators::isNumericInt($_POST['category_id'])) {
                $data += ['category_id' => $_POST['category_id']];
            } else {throw new InvalidCategoryException;}           
        
            if($_FILES['image']['size'] > 0) {
                $image = $this->imageManager->upload_image($_FILES['image']);
                $data += [
                    'image' => $image 
                ];
            } else {
                $image = '/img/default/product.png';
                $data += [
                    'image' => $image 
                ]; 
            }
            
            if(isset($_POST['status_id'])) {
                if(Validators::isNumericInt($_POST['status_id'])) {
                    $data += ['status_id' => $_POST['status_id']];
                } else {throw new InvalidStatusException;} 
            }


            $this->db->update('products', $product_id, $data);  
            flash()->success("A product with title '{$_POST['title']}' successfully update");
            
            if($this->authHelper->is_admin()) {
                Helper::redirect_to('/admin/products');
            } else {
                Helper::redirect_to('/');
            }

        } catch(InvalidTitleException $e) {
            flash()->error('Your title failed verification');
            Helper::redirect_to("/product/edit/{$product_id}");

        } catch(InvalidDescriptionException $e) {
            flash()->error('Your description failed verification');
            Helper::redirect_to("/product/edit/{$product_id}");

        } catch(InvalidTextException $e) {
            flash()->error('Your text failed verification');
            Helper::redirect_to("/product/edit/{$product_id}");

        } catch(InvalidCategoryException $e) {
            flash()->error('There is something wrong with category');
            Helper::redirect_to("/product/edit/{$product_id}");

        } catch(InvalidStatusException $e) {
            flash()->error('YThere is something wrong with status');
            Helper::redirect_to("/product/edit/{$product_id}");
        }
    }

    public function delete($vars) {
        try {
            
            $filename = stristr($this->db->get_image_path('products', $vars['product_id']), 'img');
            if(file_exists($filename) && $filename != 'img/default/product.png') {
                $this->imageManager->delete_image($filename);
            }
            $this->db->delete_reviews_by_product_id('reviews', $vars['product_id']);
            $this->db->delete('products', $vars['product_id']);

            
            flash()->success("A product with ID '{$vars['product_id']}' successfully deleted");
            if($this->authHelper->is_admin()) {
                Helper::redirect_to('/admin/products');
            } else {
                Helper::redirect_to('/');
            }
            
        } catch (\Exception $e) {
            flash()->error("Something go wrong");
            if($this->authHelper->is_admin()) {
                Helper::redirect_to('/admin/products');
            } else {
                Helper::redirect_to('/');
            }
        }

    }
}