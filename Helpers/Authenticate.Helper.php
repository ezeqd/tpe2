<?php
class authHelper {
	
	public function __construct() {}

	public function login($user){
		session_start();
		$_SESSION['userId'] = $usuario->id;
		$_SESSION['usuario'] = $usuario->email;
	}

	public function logout(){
		session_start();
		session_destroy();
	}

	public function checkLogIn(){
        session_start();
        
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

    public function getLoggedUsername() {
    	if(session_status() != PHP_SESSION_ACTIVE)
    		session_start();
    	return $_SESSION['usuario'];
    }

}
?>