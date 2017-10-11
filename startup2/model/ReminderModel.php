<?php

namespace model;

class reminderModel {
	
	private $message = '';
	
	public function getMessage() {
		return $this->message;
	}


	public function checkIfUserIsLoggedIn() {
		if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
			//Anropa funktionen saveTodo();
			$this->message = 'Du är inloggad <-- Detta är meddelandet';
			echo "Du är inloggad";
		} else {
			$this->message = 'Du är inte inloggad <-- Detta är meddelandet';
			//Sätt meddelande till = You need to Login to write a ToDo!
			echo "Du är inte inloggad";
		}
	}

	public function saveToDo() {
		//Spara texten från vyn 
		//Gör på samma sätt som när vi sparade Admin till usernaeme input? 
	}

  //Trycker på knappen "Add" i ReminderView CHECK
  //Kolla om man är inloggad eller inte CHECK
  //INLOGGAD: --> postar texten i rutan till en fil som skriver ut texen på sidan 
  //INTE INLOGGAD: --> sätt message = 'Du måste vara inloggad för att posta din anteckning!'
  

  //Funderingar: 
  //Ska det skrivas till en annan ruta eller ska det skrivas ut direkt på sidan?

}