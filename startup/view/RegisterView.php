<?php



class RegisterView {
	private static $login = 'RegisterView::UserName';
	private static $messageId = 'RegisterView::Message';
	private static $password = 'RegisterView::Password';
	private static $checkPassword = 'RegisterView::PasswordRepeat';
	private static $register = 'RegisterView::Register';
	private static $usernameStay = '';
	private $message = '';

	
	
	public function response() {
		$this->register();
	 
		return '
			<h2>Register new user</h2>
			<form action="?register" method="post" enctype="multipart/formdata">
				<fieldset>
				<legend>Register a new user - Write username and password</legend>
						<p id="' . self::$messageId . '">' . $this->message .  '</p>
					<label for="' . self::$login . '" >Username :</label>
					<input type="text" size="20" name="'. self::$login .'" id="'. self::$login .'" value="' . self::$usernameStay . '" />
					<br>
					<label for="' . self::$password . '">Password :</label>
					<input type="password" size="20" name="'. self::$password .'" id="' . self::$password . '" value="" />
					<br>
					<label for="' . self::$checkPassword .'" >Repeat password :</label>
					<input type="password" size="20" name="' . self::$checkPassword . '" id="' . self::$checkPassword . '" value="" />
					<br>
					<input id="submit" type="submit" name="' . self::$register . '"  value="Register" />
					<br>
				</fieldset>
				</form>
					';
	}

	public function propUsername(){
		$input = $_POST[self::$login];
				return self::$usernameStay = $input;
	}
	public function propPassword() {
		return $_POST[self::$password];
	}
	public function confirmPassword() {
		return $_POST[self::$checkPassword];
	}
	public function regButton() {
		return $_POST[self::$register];
	}

	private function renderIsLoggedIn($isLoggedIn) {
		if ($isLoggedIn) {
			return '<h2>Logged in</h2>';
		}
		else {
			return '<h2>Not logged in</h2>';
		}
	}
 
}
