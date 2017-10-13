<?php

namespace model;

class RegisterModel {

	private $usernameInputRegister;
	private $passwordInputRegister;
	private $confirmedPassword;
	private $message = '';
	
	public function getRegisterMessages() {
		return $this->message;
	}

	public function setUser($username) {
		$this->usernameInputRegister = $username;
	}
	public function setPassword($password) {
		$this->passwordInputRegister = $password;
	}
	public function setRepeatedPassword($repeatedPassword) {
		$this->confirmedPassword = $repeatedPassword;
	}

	public function checkChosenUsername() {
		if(strlen($this->usernameInputRegister) < 3) {
			$this->message .= "Username has too few characters, at least 3 characters.";
		}
	}
	public function checkChosenPassword() {
		if(strlen($this->passwordInputRegister) < 6) {
			$this->message .= "<br>Password has too few characters, at least 6 characters.";
		}
			if($this->passwordInputRegister != $this->confirmedPassword) {
			$this->message .= "Passwords do not match.";
			}
	}

	public function isLoggedIn() {
		return isset($_SESSION['username']);
	}
}