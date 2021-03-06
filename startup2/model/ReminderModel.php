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

	public function checkIfUserIsLoggedIn() {
		if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
			return true;
		}else {
			return false; 
		}
	}
	
	public function writeToFile() {
		if($this->checkIfUserIsLoggedIn() == true) {
			$my_file = 'ToDos.txt';
			$handle = fopen($my_file, 'a') or die("Couldn't open the file");
			$data =  "<br>" . "*" . $this->textboxValue;
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