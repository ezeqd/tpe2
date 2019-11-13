<?php
class authHelper {
	
	public function __construct() {
		if (session_status() != PHP_SESSION_ACTIVE)
			session_start();
	}

	public function login($user){
		$_SESSION['userId'] = $user->id_usuario;
		$_SESSION['usuario'] = $user->email;
	}

	public function logout(){
		session_destroy();
	}

	public function checkLogIn(){
        
        if(!isset($_SESSION['userId'])){
            header("Location: " . URL_LOGIN);
            die();
        }

        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) { 
            header("Location: " . URL_LOGOUT);
            die();
        } 
        $_SESSION['LAST_ACTIVITY'] = time();
	}
	
	public function CheckLoginAdmin(){
		$this->checkLogIn();
		if (!$_SESSION['admin']){
			$this->logout();
		}
	}

    public function getLoggedUserName() {
		
		return isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;	
		
	}
}
?>