<?php

namespace model;

class LoginModel {
	private $username;
	private $password;
	private $message = '';

	public function getUsername($usernameInputView) {
		$this->username = $usernameInputView;
	}
	
	public function getPassword($passwordInputView) {
		$this->password = $passwordInputView;
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
			$this->message = "Welcome";
			$_SESSION['username'] = $usernameInputView;
			$_SESSION['password'] = $passwordInputView;
		}
	}

	public function getMessage() {
		return $this->message;
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
		$this->message = "Bye bye!";
		unset($_SESSION['username']);
		unset($_SESSION['password']);			
	}
}