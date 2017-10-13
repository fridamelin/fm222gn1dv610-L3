<?php

namespace controller;

class LoginController {
    private $loginView;
    private $loginModel; 

    public function __construct($Loginview) {
        $this->loginView = $Loginview; 
        $this->loginModel = new \model\LoginModel();
    }

    public function userWantsToLogin() {
        if ($this->loginView->userPressedLoginButton()) 
        {
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

            if($this->loginView->userPressedKeepMeLoggedInButton()) 
            {
                $sessionUsername = $this->loginModel->getSessionUsername();
                $sessionPassword = $this->loginModel->getSessionPassword();
                
                $this->loginView->setSessionUsername($sessionUsername);
                $this->loginView->setSessionPassword($sessionPassword);
                $this->loginView->keepUserLoggedIn();
            }
        } else if ($this->loginView->userPressedLogoutButton())
            {
                $this->loginModel->logout();
                $this->loginView->unsetCookies();
                $message = $this->loginModel->getMessage();
                $this->loginView->setMessage($message);
            }else if ($this->loginModel->isLoggedIn() == false) 
            {
                $cookieUsername = $this->loginView->getCookieName();
                $cookiePassword = $this->loginView->getCookiePassword();
                    if($this->loginModel->loginCookie($cookieUsername, $cookiePassword) == false)
                    {
                        $this->loginView->unsetCookies();
                    }
                $message = $this->loginModel->getMessage();
                $this->loginView->setMessage($message);
            }
        return $this->loginModel; 
    }
}

