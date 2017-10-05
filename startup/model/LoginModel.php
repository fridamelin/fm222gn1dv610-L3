<?php

class LoginModel {
	
	private $loginView;

    public function __construct() {
        $this->loginView = new LoginView();
    }

		//DENNA KOMMER FRÅN LOGINVIEW//
    public function login(){
		$username = $this->loginView->getRequestUserName();
        $password = $this->loginView->getRequestPassword();
		$keep = $this->loginView->keep();
		$cookieName = $this->loginView->getCookieName();
		$cookiePassw = $this->loginView->getCookiePassw();
        $logout = $this->loginView->logout();

		 $random = password_hash("Password", PASSWORD_DEFAULT);
		if(isset($username) || isset($password))
		{
			$response = '';

			if($username == 'Admin' && password_verify($password, $random))
			{
				if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
				{
					$this->message = "Welcome";
				} 
			    $_SESSION['username'] = $username;
			    $_SESSION['password'] = $random;
                    if(isset($keep))
				    {
					$this->keepUserLoggedIn(); 
					$this->message = "Welcome and you will be remembered";
				    }	
			    $response = $this->generateLogoutButtonHTML($this->message);
			    return $response;
			} 
			else 
			{
				$this->message = "Wrong name or password";
			}

			if ($password == '')
			{
				$this->loginView->getRequestUserName();
				$this->message = "Password is missing";
			}
			
			if ($username == '')
			{
				$this->message = "Username is missing";
			}
		} else if (isset($cookieName) && isset($cookiePassw))
			{
				if($cookieName == 'Admin' && password_verify("Password", $cookiePassw))
				{
					if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
					{
						$this->message = "Welcome back with cookie";
					} 
				$_SESSION['username'] = $cookieName;
				$_SESSION['password'] = $cookiePassw;
				} else 
				{
					$this->message = "Wrong information in cookies";
					setcookie($cookieName, '', time()-3600);
					setcookie($cookiePassw, '', time()-3600);
				}
			}
		if(isset($logout))
		{
			if(isset($_SESSION['username']) && isset($_SESSION['password']))
			{
				$this->message = "Bye bye!";
			}
            session_unset();
            
            //Om session_status = false(stängd) -> skicka någonting till vyn som säger att cookies ska bli '' 
			setcookie(self::$cookieName, '', time()-3600);
			setcookie(self::$cookiePassword, '', time()-3600);
		}

		//if(isset($_SESSION['username']))
		//{			
		//	 $this->generateLogoutButtonHTML($this->message);
		//}
    }

    public function isLoggedIn() {
        if(isset($_SESSION['username'])){
            return true;
        } else 
        {
            return false; 
        }
    }

    //osäker på om denna ska vara här
    private function keepUserLoggedIn() {
		setcookie(self::$cookieName, $_SESSION['username'], time()+3600);
		setcookie(self::$cookiePassword, $_SESSION['password'], time()+3600);
	}

}