<?php

namespace model;

class LoginModel {
	private $username;
	private $password;
	private $cookieName;
	private $cookiePassword;
	private $message = '';

	public function getUsername($usernameInputView) {
		$this->username = $usernameInputView;
	}
	public function getPassword($passwordInputView) {
		$this->password = $passwordInputView;
	}
	public function getMessage() {
		return $this->message;
	}

	
	public function checkPassword($passwordInputView, $usernameInputView) {
		if($passwordInputView == '') {
			$this->message = "Password is missing";
		}
		else if($passwordInputView != 'Password' && $usernameInputView == 'Admin') {
			$this->message = "Wrong name or password";
		}
		else if($usernameInputView == 'Admin' && $passwordInputView == ''){
			$this->message = "Password is missing";
		}
	}

	public function checkUsername($usernameInputView, $passwordInputView) {
		if($usernameInputView == '' &&  $passwordInputView = '') {
			$this->message = "Username is missing";
		}
		else if($usernameInputView == ''){
			$this->message = "Username is missing";
		}
		else if($passwordInputView == 'Password' && $usernameInputView == '') {
			$this->message = "Username is missing";
		}
		else if($passwordInputView == 'Password' && $usernameInputView != 'Admin') {
			$this->message = "Wrong name or password";
		}
	}


	public function login($usernameInputView, $passwordInputView) {
		if($usernameInputView == 'Admin' && $passwordInputView == 'Password'){
			if($this->isLoggedIn() == false) {
				$this->message = "Welcome";
			}
			$_SESSION['username'] = $usernameInputView;
			$_SESSION['password'] = $passwordInputView;
		}
	}

	public function loginCookie($cookieUsername, $cookiePassword) {
		if ($cookieUsername == '' || $cookiePassword == ''){
			return false; 
		}
			if($cookieUsername == 'Admin' && $cookiePassword == 'Password') {
				if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
					$this->message = 'Welcome back with cookie';
				}
				$_SESSION['username'] = $cookieUsername;
				$_SESSION['password'] = $cookiePassword;
				return true;
			}else {
				$this->logout();
				$this->message = 'Wrong information in cookies';
				return false; 
			}	
	}


	public function isLoggedIn() {
		return isset($_SESSION['username']);
	}

	public function getSessionUsername() {
		return $_SESSION['username'];
	}

	public function getSessionPassword() {
		return $_SESSION['password'];
	}

	public function logout() {
		if($this->isLoggedIn() == true){
			$this->message = "Bye bye!";
		}
		unset($_SESSION['username']);
		unset($_SESSION['password']);			
	}
}