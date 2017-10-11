<?php

namespace model;

class reminderModel {
	
	public function checkIfUserIsLoggedIn() {
		if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
			echo "Du är inloggad";
		} else {
			echo "Du är inte inloggad";
		}
	}

  //Trycker på knappen "Add" i ReminderView
  //Kolla om man är inloggad eller inte 
  //INLOGGAD: --> postar texten i rutan till en fil som skriver ut texen på sidan
  //INTE INLOGGAD: --> sätt message = 'Du måste vara inloggad för att posta din anteckning!'
  

  //Funderingar: 
  //Ska det skrivas till en annan ruta eller ska det skrivas ut direkt på sidan?

}