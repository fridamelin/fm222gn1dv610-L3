<?php

namespace model;

class LoginModel {
	private $username;
	private $password;
	private $message = '';

	public function getUsername($usernameInputView) {
		$this->username = $usernameInputView;
		//Hämta userinput från controller (som egentligen kommer från view POST)
	}
	
	public function getPassword($passwordInputView) {
		$this->password = $passwordInputView;
		//Hämta userinput från controller (som egentligen kommer från view POST)
	}

	//public function setUsername($name) {
		//$username = $name;
	//}

	//public function setPassword($inputPassword) {
	//	$password = $inputPassword;
	//}

	public function checkUsername($usernameInputView) {
		if($usernameInputView != 'Admin'){
			$this->message = "Username is missing";
		}
	}

	public function checkPassword($passwordInputView) {
		if($passwordInputView != 'Password') {
			$this->message = "Password is missing";
		}
	}

	public function login($usernameInputView,$passwordInputView) {
		if($usernameInputView == 'Admin' && $passwordInputView == 'Password'){
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
		}
	
	}

	public function isLoggedIn() {
		return isset($_SESSION['username']);
	}

	public function logout() {
		unset($_SESSION['username']);		
	}
}