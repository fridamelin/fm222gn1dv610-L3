<?php

namespace controller;

class RegisterController {
    private $registerView;
    private $registerModel;

    public function __construct($registerView) {
        $this->registerView = $registerView;
        $this->registerModel = new \model\RegisterModel();
    }

    public function userWantsToRegister() {
        if($this->registerView->userPressedRegisterButton()) 
        {
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
            $message = $this->registerModel->getRegisterMessages();
            $this->registerView->setRegisterMessages($message);
        }
        return $this->registerModel;
    }  
}