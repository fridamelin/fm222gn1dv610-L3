<?php

namespace model;

class LoginModel {
	private $username;
	private $password;

	public function getUsername() {
		//Hämta userinput från controller (som egentligen kommer från view POST)
	}
	
	public function getPassword() {
		//Hämta userinput från controller (som egentligen kommer från view POST)
	}

	public function setUsername($name) {
		$username = $name;

		//Controllen skickar username från vyn 
	}

	public function setPassword() {
		//Controllen skickar password från vyn 
	}

	public function checkUsername($name) {
		//Regler för username 
		if($name != 'Admin')
			//kasta undantag Gör ett meddelande i vyn som hämtar i controller ??? 
	}

	public function checkPassword() {
		//Regler för password
	}


	public function login() {
		//SESSION 
	}

	public function isLoggedIn() {
		//return isset session username 
	}
}