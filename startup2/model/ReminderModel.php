<?php

namespace model;

class reminderModel {
    
    public function isLoggedIn() {
		return isset($_SESSION['username']);
	}
}