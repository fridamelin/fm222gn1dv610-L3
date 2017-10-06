<?php

namespace view; 

class LoginView {

	private static $login = 'LoginView::Login';
    private static $logout = 'LoginView::Logout';
    private static $name = 'LoginView::UserName';
    private static $password = 'LoginView::Password';
    private static $cookieName = 'LoginView::CookieName';
    private static $cookiePassword = 'LoginView::CookiePassword';
    private static $keep = 'LoginView::KeepMeLoggedIn';
    private static $messageId = 'LoginView::Message';
    private static $keepUsername = '';
    private $message = '';
	private $loginModel;

	public function response($loginModel) {
		$this->loginModel = $loginModel; 

		if($loginModel->isLoggedIn()){
			return $this->generateLogoutButtonHTML($this->message);
		} else 
		{
			return $this->generateLoginFormHTML($this->message);
		}
	}

	public function userPressedLoginButton() {
        return isset($_POST[self::$login]);
	}

	public function getRequestUserName() {
        if (isset($_POST[self::$name])) {
            $inputUser = $_POST[self::$name];
            self::$keepUsername = $inputUser;
            return $inputUser;
        }
	}   
	
    public function getRequestPassword() {
            return isset($_POST[self::$password]);  
	}   
	
    public function keep() {
            return isset($_POST[self::$keep]);
    }

    public function getCookieName() {
            return isset($_COOKIE[self::$cookieName]);
    }

    public function getCookiePassword() {
            return isset($_COOKIE[self::$cookiePassword]);
	}
	
	public function userPressedLogoutButton() {
		return isset($_POST[self::$logout]);
	}

	private function generateLogoutButtonHTML($message) {
		return '
		<form  method="post" >
			<p id="' . self::$messageId . '">' . $message .'</p>
			<input type="submit" name="' . self::$logout . '" value="logout"/>
		</form>
	';
	}

	private function generateLoginFormHTML($message) {
		return '
		<form method="post" > 
			<fieldset>
				<legend>Login - enter Username and password</legend>
				<p id="' . self::$messageId . '">' . $message .  '</p>
				
				<label for="' . self::$name . '">Username :</label>
				<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . self::$keepUsername . '" />

				<label for="' . self::$password . '">Password :</label>
				<input type="password" id="' . self::$password . '" name="' . self::$password . '" />
				
				<label for="' . self::$keep . '">Keep me logged in  :</label>
				<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
									
				<input type="submit" name="' . self::$login . '" value="login" />
			</fieldset>
		</form>
		';		
	}
}