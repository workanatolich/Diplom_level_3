<?php

namespace App\Models;

use Delight\Auth\EmailNotVerifiedException;
use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\InvalidSelectorTokenPairException;
use Delight\Auth\NotLoggedInException;
use Delight\Auth\TokenExpiredException;
use Delight\Auth\TooManyRequestsException;
use Delight\Auth\UserAlreadyExistsException;

class AuthManager extends ManagerModel{
    public function logout() {
        try {
            $this->auth->logOutEverywhere();
            Helper::redirect_to('/');
        }
        catch (NotLoggedInException $e) {
            Helper::redirect_to('/');
        }
    }
    
    public function login() {
        try {
            $this->auth->login($_POST['email'], $_POST['password']);
            if ($this->authHelper->is_admin()) {
                Helper::redirect_to('/admin'); 
            } else {
                Helper::redirect_to('/');
            }
        }
        catch (InvalidEmailException $e) {
            flash()->error('Wrong email address');
            Helper::redirect_to('/login');
        }
        catch (InvalidPasswordException $e) {
            flash()->error('Wrong password');
            Helper::redirect_to('/login');
        }
        catch (EmailNotVerifiedException $e) {
            flash()->error('Email not verified');
            Helper::redirect_to('/login');
        }
        catch (TooManyRequestsException $e) {
            flash()->error('Too many requests');
            Helper::redirect_to('/login');
        }
    }

    public function register() {
        try {
            $this->auth->register($_POST['email'], $_POST['password'], $_POST['username'], function ($selector, $token) {        
                $data = [
                    'subject' => 'submit your email',
                    'text' => "Your selector: $selector\nYour token: $token"
                ];
    
                $this->mailer->send('admin_test@test.com', $_POST['email'], $data, 'admin', $_POST['username']);
                Helper::redirect_to('/confirm_email');
            });
        } catch (InvalidEmailException $e) {
            flash()->error('Invalid email address');
            Helper::redirect_to('/registration');
        } catch (InvalidPasswordException $e) {
            flash()->error('Invalid password');
            Helper::redirect_to('/registration');
        } catch (UserAlreadyExistsException $e) {
            flash()->error('User already exists');
            Helper::redirect_to('/registration');
        } catch (TooManyRequestsException $e) {
            flash()->error('Too many requests');
            Helper::redirect_to('/registration');
        }
    }
    
    public function confirm_email() {
        try {
            $this->auth->confirmEmail($_POST['selector'], $_POST['token']);
            flash() -> success('You have successfully registered');
            Helper::redirect_to('/login');
        }
        catch (InvalidSelectorTokenPairException $e) {
            flash() -> error('Invalid token');
            Helper::redirect_to('/confirm_email');
        }
        catch (TokenExpiredException $e) {
            flash() -> error('Token expired');
            Helper::redirect_to('/login');
        }
        catch (UserAlreadyExistsException $e) {
            flash() -> error('Email address already exists');
            Helper::redirect_to('/login');
        }
        catch (TooManyRequestsException $e) {
            flash() -> error('Too many requests');
            Helper::redirect_to('/confirm_email');
        }
    }
}