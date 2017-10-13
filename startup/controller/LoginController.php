<?php

namespace controller;

class LoginController {
    private $loginView;
    private $loginModel; 

    public function __construct($view) {
        $this->loginView = $view; 
        $this->loginModel = new \model\LoginModel();
        
    }

    public function userWantsToLogin() {

        if ($this->loginView->userPressedLoginButton()) {

            $usernameInputView =  $this->loginView->getRequestUserName();
            $passwordInputView = $this->loginView->getRequestPassword(); 

            $this->loginModel->getUsername($usernameInputView);
            $this->loginModel->getPassword($passwordInputView);
            $this->loginModel->checkUsername($usernameInputView);
            $this->loginModel->checkPassword($passwordInputView);
            //$this->loginModel->setUsername($name);
            //$this->loginModel->setPassword($inputPassword);
            $this->loginModel->login($usernameInputView, $passwordInputView);

        }
        else {
            //logout
        }

        return $this->loginModel; 
    }

    public function userWantsToLogOut() {
        if($this->loginView->userPressedLogoutButton()) {
            this->loginModel->logout();
        }
    }
}