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

	public function getCookieUsername($cookieUsername) {
		$this->cookieName = $cookieUsername;
	}
	public function getCookiePassword($cookiePassword) {
		$this->cookiePassword = $cookiePassword;
	}

	public function login($usernameInputView, $passwordInputView) {
		if($usernameInputView == 'Admin' && $passwordInputView == 'Password'){
			$this->message = "Welcome";
			$_SESSION['username'] = $usernameInputView;
			$_SESSION['password'] = $passwordInputView;
		}
		//Verkar inte fungera .... 
		else if (isset($cookieUsername) && isset($cookiePassword)) {
			if($cookieUsername == 'Admin' && $cookiePassword == 'Password') {
				if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
					$this->message = 'Welcome back with cookie';
				}
				$_SESSION['username'] = $cookieUsername;
				$_SESSION['password'] = $tcookiePassword;
			} else {
				$this->message = 'Wrong information in cookies';
				//Sätt cookies till '' ???
			}
		}
	}

	
	public function isLoggedIn() {
		return isset($_SESSION['username']);
	}

	//Ska detta vara i controllern istället? 
	public function getSessionUsername() {
		return $_SESSION['username'];
	}
	public function getSessionPassword() {
		return $_SESSION['password'];
	}

	public function logout() {
		$this->message = "Bye bye!";
		unset($_SESSION['username']);
		unset($_SESSION['password']);			
	}
}