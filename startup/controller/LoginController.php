<?php

namespace controller;

class LoginController {
    private $loginView;
    private $loginModel; 

    public function __construct($view, $model) {
        $this->loginView = $view; 
        $this->loginModel = $model;
    }

    public function userWantsToLogin() {

        //kollar om man har postar login knapp
        //

       //Hämta username från view - validera check() -  set() 	$this->setUsername($name);

        //return this->loginModel; 
    }
}