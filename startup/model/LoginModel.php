<?php

namespace model;

class LoginModel {
	private $username;
	private $password;
	private $message = '';

	public function getUsername() {
		//Hämta userinput från controller (som egentligen kommer från view POST)
	}
	
	public function getPassword() {
		//Hämta userinput från controller (som egentligen kommer från view POST)
	}

	public function setUsername($name) {
		$username = $name;
	}

	public function setPassword() {
		$password = $inputPassword;
	}

	public function checkUsername($name) {
		if($name != 'Admin'){
			$this->message = "Username is missing";
		}
	}

	public function checkPassword() {
		if($inputPassword != 'Password') {
			$this->message = "Password is missing";
		}
	}

	public function login() {
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
	}

	public function isLoggedIn() {
		return isset($_SESSION['username']);
	}

	public function logout() {
		unset($_SESSION['username']);		
	}
}