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
	private $sessionUsername;
	private $sessionPassword;

	public function setMessage($message) {
		$this->message = $message;
	}

	public function setSessionUsername($sessionUsername) {
		$this->sessionUsername = $sessionUsername;
	}

	public function setSessionPassword($sessionPassword) {
		$this->sessionPassword = $sessionPassword;
	}

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

	public function setRequestUserName() {
        if (isset($_POST[self::$name])) {
            $inputUser = $_POST[self::$name];
            self::$keepUsername = $inputUser;
            return $inputUser;
        }
	}   
    public function setRequestPassword() {
	    if(isset($_POST[self::$password])){
		return ($_POST[self::$password]); 
	    }
	}   


    public function userPressedKeepMeLoggedInButton() {
		return isset($_POST[self::$keep]); 
	}
	public function keepUserLoggedIn(){
		setcookie(self::$cookieName, $this->sessionUsername, time()+3600); 
		setcookie(self::$cookiePassword, $this->sessionPassword, time()+3600);
		$this->message = 'Welcome and you will be remembered';
	}
    public function getCookieName() {
        if(isset($_COOKIE[self::$cookieName])) {
			return $_COOKIE[self::$cookieName];
		}
    }
    public function getCookiePassword() {
        if(isset($_COOKIE[self::$cookiePassword])) {
				return $_COOKIE[self::$cookiePassword];
		}
	}


	public function unsetCookies() {
		setcookie(self::$cookieName, '', time()-3600);
		setcookie(self::$cookiePassword, '', time()-3600);
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
