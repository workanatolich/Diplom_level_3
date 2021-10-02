<?php

namespace App\Models; 

use Nette\Utils\Validators;

use App\Exceptions\ReviewIsAlreadyExistsException;
use App\Exceptions\IdNotValidException;
use App\Exceptions\TextNotUnicodeTypeException;
use App\Exceptions\StatusIdNotIntegerException;


class ReviewManager extends ManagerModel{
    public function create($vars) {
        try {
            $user_id = $this->authHelper->get_user_id();
            if($this->db->get_one_by_user_id('reviews', $user_id) == false || $this->authHelper->is_admin()) {
                $data = ["user_id" => $user_id];

                if(Validators::isUnicode($_POST['text'])) {
                    $data += ['text' => $_POST['text']];
                } else {throw new TextNotUnicodeTypeException;}

                if(Validators::isNumericInt($vars['product_id'])) {
                    $data += ["product_id" => $vars['product_id']];
                } else {throw new IdNotValidException;}

                if(!empty($_POST['status'])) {
                    if(Validators::isNumericInt($_POST['status_id']) && $this->authHelper->is_admin()) {
                        $data += ['status_id' => $_POST['status_id']];
                    } else {throw new StatusIdNotIntegerException;}
                } else {
                    $data += ['status_id' => 1];
                }

                $this->db->add('reviews', $data);
                flash()->success("A review with ID '{$vars['review_id']}' successfully added");

                if($this->authHelper->is_admin()) {Helper::redirect_to("/admin/reviews");} 
                else {Helper::redirect_to("/product/{$vars['product_id']}");}
                   
            } else {throw new ReviewIsAlreadyExistsException;}

        } catch (TextNotUnicodeTypeException $e) {
            flash()->error('Your text has been rejected');
            
            if($this->authHelper->is_admin()) {Helper::redirect_to("/admin/review/create");} 
            else {Helper::redirect_to("/product/{$vars['product_id']}");}

        } catch (IdNotValidException $e) {
            flash()->error('ID is not valid');
            
            if($this->authHelper->is_admin()) {Helper::redirect_to("/admin/review/create");} 
            else {Helper::redirect_to("/product/{$vars['product_id']}");}
        
        } catch(ReviewIsAlreadyExistsException $e) {
            flash()->error('You already have a review');
            
            if($this->authHelper->is_admin()) {Helper::redirect_to("/admin/review/create");} 
            else {Helper::redirect_to("/product/{$vars['product_id']}");}
        
        } catch (StatusIdNotIntegerException $e) {
            flash()->error('Status id is not an integer'); 
            
            if($this->authHelper->is_admin()) {Helper::redirect_to("/admin/review/create");} 
            else {Helper::redirect_to("/product/{$vars['product_id']}");}
        }
    }

    public function edit($vars) {
        try {
            if(Validators::isNumericInt($vars['review_id'])) {
                if(Validators::isUnicode($_POST['text'])) {
                    $data = ['text' => $_POST['text']];
                } else {throw new TextNotUnicodeTypeException;}

                if(!empty($_POST['status'])) {
                    if(Validators::isNumericInt($_POST['status_id'])) {
                        $data += ['status_id' => $_POST['status_id']];
                    } else {throw new StatusIdNotIntegerException;}
                }
    
                $this->db->update('reviews', $vars['review_id'], $data);
                flash()->success("A review with ID '{$vars['review_id']}' successfully updated");
                
                if($this->authHelper->is_admin()) {Helper::redirect_to("/admin/reviews");} 
                else {Helper::redirect_to("/product/{$vars['product_id']}");}

            } else {throw new IdNotValidException;}

        } catch (TextNotUnicodeTypeException $e) {
            flash()->error('Your text has been rejected');
            
            if($this->authHelper->is_admin()) {Helper::redirect_to("/admin/review/edit/{$vars['review_id']}");} 
            else {Helper::redirect_to("/product/{$vars['product_id']}");}

        } catch (IdNotValidException $e) {
            flash()->error('ID is not valid');
            
            if($this->authHelper->is_admin()) {Helper::redirect_to("/admin/review/edit/{$vars['review_id']}");} 
            else {Helper::redirect_to("/product/{$vars['product_id']}");}
        
        } catch (StatusIdNotIntegerException $e) {
            flash()->error('Status id is not an integer'); 
            
            if($this->authHelper->is_admin()) {Helper::redirect_to("/admin/review/edit/{$vars['review_id']}");} 
            else {Helper::redirect_to("/product/{$vars['product_id']}");}
        }
    }

    public function delete($vars) {
        try {
            if(Validators::isNumericInt($vars['review_id'])) {
                $this->db->delete('reviews', $vars['review_id']);
                flash()->success("A review with ID '{$vars['review_id']}' succeffully deleted");
                if($this->authHelper->is_admin()) {Helper::redirect_to("/admin/reviews");} 
                else {Helper::redirect_to("/product/{$vars['product_id']}");}

            } else {
                throw new IdNotValidException;
            }

        } catch (IdNotValidException $e) {
            flash()->error('ID is not valid');
            Helper::redirect_to("/product/{$vars['product_id']}");
        }
    }
}