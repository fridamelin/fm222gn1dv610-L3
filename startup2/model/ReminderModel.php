<?php

namespace model;
class reminderModel {
	
	private $message = '';
	private $textboxValue;
	private $test;
	
	public function getMessage() {
		return $this->message;
	}

	public function setValueInTextBox($value) {
		$this->textboxValue = $value;
	}

	public function testar($testar) {
		$this->test = $testar;
	}

	public function checkIfUserIsLoggedIn() {
		if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
		return true;
	} else {
		return false; 
		}
	}
	//Nu skriver den över, vill att den ska lägga till..
	public function writeToFile() {
		if($this->checkIfUserIsLoggedIn() == true) {
			$my_file = 'ToDos.txt';
			$handle = fopen($my_file, 'w+') or die("Couldn't open the file");
			$data = $this->textboxValue;
			fwrite($handle, $data); 
			$this->message = 'Saved!';
		} else {
			$this->message = 'You need to login!';
		}
	}

	public function canIShowFile() {
		if($this->checkIfUserIsLoggedIn() == true) {
			return true;
		} else {
			$this->message = 'Sorry, you need to login to see your ToDo:s';
			return false; 
		}
	}	
}