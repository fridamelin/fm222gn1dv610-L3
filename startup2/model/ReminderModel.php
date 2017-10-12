<?php

namespace model;
class reminderModel {
	
	private $message = '';
	private $textboxValue;
	
	public function getMessage() {
		return $this->message;
	}
	//Sätt värdet i input till $value;
	public function setValueInTextBox($value) {
		$this->textboxValue = $value;
	}
	//Kolla om användaren är inloggad eller inte 
	public function checkIfUserIsLoggedIn() {
		if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
		return true;
	} else {
		return false; 
		}
	}
	//Skriv toDo:n till en fil.. FUNGERAR EJ
	public function writeToFile() {
		if($this->checkIfUserIsLoggedIn() == true) {
			$my_file = 'ToDos.txt';
			$handle = fopen($my_file, 'w');
			$data = $this->textboxValue;
			fwrite($handle, $data); 
			$this->message = 'Saved!';
		} else {
			$this->message = 'You need to login!';
		}
	}


  //Trycker på knappen "Add" i ReminderView CHECK
  //Kolla om man är inloggad eller inte CHECK
  //INLOGGAD: --> postar texten i rutan till en fil som skriver ut texen på sidan 
  //INTE INLOGGAD: --> sätt message = 'Du måste vara inloggad för att posta din anteckning!'
  

  //Funderingar: 
  //Ska det skrivas till en annan ruta eller ska det skrivas ut direkt på sidan?

}