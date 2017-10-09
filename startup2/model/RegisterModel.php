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

	public function getUser() {
		$this->usernameInputRegister = $username;
	}
	public function getPassword() {
		$this->passwordInputRegister = $password;
	}
	public function getRepeatedPassword() {
		$this->confirmedPassword = $repeatedPassword;
	}

	public function checkChosenUsername() {
		if(strlen($username) < 3) {
			$this->message .= "Username has too few characters, at least 3 characters.";
		}
	}
	public function checkChosenPassword() {
		if(strlen($password) < 6) {
			$this->message .= "<br>Password has too few characters, at least 6 characters.";
		}
			if($password != $repeatedPassword) {
			$this->message .= "Passwords do not match.";
			}
	}
}