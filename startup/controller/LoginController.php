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

        //kollar om man har postar login knapp
        if ($this->loginView->userPressedLoginButton()) {
            //Hämta username från view - validera check() -  set() 	$this->setUsername($name);
            //Hämta password från view - validera check() -  set() 	$this->setPassword($password);
            //model->Login()




        }
        else {
            //logout
        }

        return $this->loginModel; 
    }
}