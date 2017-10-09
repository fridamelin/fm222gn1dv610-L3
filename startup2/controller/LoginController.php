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

            $this->loginModel->checkPassword($passwordInputView, $usernameInputView);
            $message = $this->loginModel->getMessage();
            $this->loginView->setMessage($message);

            $this->loginModel->checkUsername($usernameInputView, $passwordInputView);
            $message = $this->loginModel->getMessage();
            $this->loginView->setMessage($message);

            $this->loginModel->login($usernameInputView, $passwordInputView);
            $message = $this->loginModel->getMessage();
            $this->loginView->setMessage($message);
        }
        else {
            if($this->loginView->userPressedLogoutButton()) {
                $this->loginModel->logout();
                $message = $this->loginModel->getMessage();
                $this->loginView->setMessage($message);
            }
        }
        return $this->loginModel; 
    }

}