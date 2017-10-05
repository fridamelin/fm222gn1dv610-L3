<?php

require_once("view/RegisterView.php");

class RegisterModel {

    private $registerView;
    
        public function __construct() {
            $this->registerView = new \view\RegisterView();
        }

    public function newUser() {
        $userRequest = $this->registerView->propUsername();
        $passwordRequest = $this->registerView->propPassword();
        $repeatPassword = $this->registerView->confirmPassword();
        $button = $this->registerView->regButton();
    }
    
	public function register(){
		if(isset($button)){
			if(strlen($userRequest) < 3){
				 $this->message .= 'Username has too few characters, at least 3 characters.';
				 $this->propUsername();
				}
				if(strlen($passwordRequest) < 6){
				 $this->message .= '<br>Password has too few characters, at least 6 characters.';
					if(strlen($userRequest) > 3){
						$this->propUsername();
					}
				}
				if($passwordRequest != $repeatPassword){
					$this->message .= 'Passwords do not match.';
					$this->propUsername();
				}
			}
		}




}