<?php

namespace controller;

class LoginController {
    private $loginView;
    private $loginModel; 
    private $registerView;
    private $registerModel;

    public function __construct($view, $registerView) {
        $this->loginView = $view; 
        $this->loginModel = new \model\LoginModel();
        $this->registerView = $registerView;
        $this->registerModel = new \model\RegisterModel();
        
    }

    public function userWantsToLogin() {

        if ($this->loginView->userPressedLoginButton()) {
            $usernameInputView =  $this->loginView->setRequestUserName();
            $passwordInputView = $this->loginView->setRequestPassword(); 
            $this->loginModel->getUsername($usernameInputView);
            $this->loginModel->getPassword($passwordInputView);

            $this->loginModel->checkPassword($passwordInputView, $usernameInputView);
            $message = $this->loginModel->getMessage();
            $this->loginView->setMessage($message);

            $this->loginModel->checkUsername($usernameInputView, $passwordInputView);
            $message = $this->loginModel->getMessage();
            $this->loginView->setMessage($message);

            $this->loginModel->login($usernameInputView, $passwordInputView);
            $message = $this->loginModel->getMessage();
            $this->loginView->setMessage($message);

            if($this->loginView->keepUserLoggedInButton()) {
                
                //$sessionUsername = $this->loginModel->getSessionUsername();
                //$sessionPassword = $this->loginModel->getSessionPassword();
                
                //$this->loginView->setSessionUsername($sessionUsername);
                //$this->loginView->setSessionPassword($sessionPassword);


                //Skicka cookienamn samt password till modellen 
                $cookieUsername = $this->loginView->setCookieName();
                $cookiePassword = $this->loginView->setCookiePassword();

                $this->loginModel->getCookieUsername($cookieUsername);
                $this->loginModel->getCookiePassword($cookiePassword);

                $message = $this->loginModel->getMessage();
                $this->loginView->setMessage();

            }
        } else {
            if($this->loginView->userPressedLogoutButton()) {
                $this->loginModel->logout();
                $message = $this->loginModel->getMessage();
                $this->loginView->setMessage($message);
            }
        }
        return $this->loginModel; 
    }

    public function userWantsToRegister() {

        if($this->registerView->userPressedRegisterButton()) {

            $username = $this->registerView->getChosenUsername();
            $password = $this->registerView->getChosenPassword();
            $repeatedPassword = $this->registerView->getConfirmedPassword();
            $this->registerModel->setUser($username);
            $this->registerModel->setPassword($password);
            $this->registerModel->setRepeatedPassword($repeatedPassword);

            $this->registerModel->checkChosenUsername($username);
            $message = $this->registerModel->getRegisterMessages();
            $this->registerView->setRegisterMessages($message);

            $this->registerModel->checkChosenPassword($password);
            $messages = $this->registerModel->getRegisterMessages();
            $this->registerView->setRegisterMessages($message);
        }
    }
    
}

