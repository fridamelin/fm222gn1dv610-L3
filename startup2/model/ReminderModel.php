<?php

namespace model;
class reminderModel {
	
	private $message = '';
	private $textboxValue;
	
	public function getMessage() {
		return $this->message;
	}

	public function setValueInTextBox($value) {
		$this->$textboxValue = $value;
	}
	public function checkIfUserIsLoggedIn() {
		if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
		return true;
	} else {
		return false; 
		}
	}

	public function writeToFile() {
		if($this->checkIfUserIsLoggedIn() == true) {
			$my_file = 'ToDos.txt';
			$handle = fopen($my_file, 'w');
			$data = $this->textboxValue;
			fwrite($handle, $data);
			$this->message = 'Du är inloggad <-- Detta är meddelandet';
			echo "Du är inloggad";
		} else {
			$this->message = 'Du är inte inloggad <-- Detta är meddelandet';
			echo "Du är inte inloggad";
		}
	}


  //Trycker på knappen "Add" i ReminderView CHECK
  //Kolla om man är inloggad eller inte CHECK
  //INLOGGAD: --> postar texten i rutan till en fil som skriver ut texen på sidan 
  //INTE INLOGGAD: --> sätt message = 'Du måste vara inloggad för att posta din anteckning!'
  

  //Funderingar: 
  //Ska det skrivas till en annan ruta eller ska det skrivas ut direkt på sidan?

}