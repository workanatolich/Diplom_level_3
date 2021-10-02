<?php

namespace App\Models;

use Nette\Utils\Validators;
use App\Models\ProductManager;
use App\Models\ManagerModel;

use App\Exceptions\TextNotUnicodeTypeException;
use App\Exceptions\IdNotValidException;


class UserManager{

    public function __construct(ProductManager $productManager, ManagerModel $managerModel)
    {   
        $this->tool = $managerModel;
        $this->productManager = $productManager;
    }

    public function create() {
        try {
            $userId = $this->tool->auth->admin()->createUser($_POST['email'], $_POST['password'], $_POST['username']);
            flash()->success("User with ID $userId successfully added");
            Helper::redirect_to("/admin/users");
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error('Invalid email address');
            Helper::redirect_to("/admin/user/create");
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error('Invalid password');
            Helper::redirect_to("/admin/user/create");
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error('User already exists');
            Helper::redirect_to("/admin/user/create");
        }
    }

    public function edit($vars) {
        try {
            if(Validators::isNumericInt($_POST['roles_mask'])) {
                $data = ['roles_mask' => $_POST['roles_mask']];
            } else {throw new IdNotValidException;}

            if(Validators::isUnicode($_POST['username'])) {
                $data += ['username' => $_POST['username']];
            } else {throw new TextNotUnicodeTypeException;}
        
            if(Validators::isNumericInt($vars['user_id'])) {
                $this->tool->db->update('users', $vars['user_id'], $data);
                flash()->success("User with ID {$vars['user_id']} successfully updated");
                Helper::redirect_to("/admin/users");
            } else {throw new IdNotValidException;}
        
        } catch (IdNotValidException $e) {
            flash()->error('ID is not valid');
            Helper::redirect_to("/admin/user/edit/{$vars['user_id']}");
        } catch (TextNotUnicodeTypeException $e) {
            flash()->error('Your text has been rejected');
            Helper::redirect_to("/admin/user/edit/{$vars['user_id']}");
        } 

    }

    public function delete($vars) {
        try {
            $products = $this->tool->db->get_all_by_user_id('products', $vars['user_id']);
            foreach($products as $product) {
                $data = ['product_id' => $product['id']];
                $this->productManager->delete($data);
            }
            $this->tool->auth->admin()->deleteUserById($vars['user_id']);
            flash()->success("A user with id '{$vars['user_id']}' succefully deleted");
        }
        catch (\Delight\Auth\UnknownIdException $e) {
            flash()->error('Unknown ID');
            Helper::redirect_to("/admin/users");
        }
    }
}