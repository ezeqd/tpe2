<?php
require_once "./Models/UserModel.php";
require_once "./Views/UserView.php";

class UserController {

    private $model;
    private $view;

	function __construct(){
        $this->model = new UserModel();
        $this->view = new UserView();
    }
    
    public function IniciarSesion(){
        $password = $_POST['password'];

        $usuario = $this->model->GetPassword($_POST['usuario']);
        // $hash = password_hash($password, PASSWORD_DEFAULT);
        // var_dump($hash);
        // var_dump($usuario);

        if (isset($usuario) && $usuario != null && password_verify($password, $usuario->password)){
            session_start();
            $_SESSION['usuario'] = $usuario->email;
            $_SESSION['userId'] = $usuario->id_usuario;
            header("Location: " . URL_EVENTOS);
        }else{
            $this->view->DisplayLogin("Error en inicio de Sesión");
        }
       // header("Location: " . BASE_URL);
    }

    public function checkLogIn(){
        session_start();
        
        if(!isset($_SESSION['userId'])){
            header("Location: " . URL_LOGIN);
            die();
        }

        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) { 
            header("Location: " . URL_LOGOUT);
            die(); // destruye la sesión, y vuelve al login
        } 
        $_SESSION['LAST_ACTIVITY'] = time();
    }



    public function ShowLogin(){
        $this->view->DisplayLogin();
    }

    public function ShowLogout(){
        session_start();
        session_destroy();
        header("Location: " . URL_LOGIN);
    }

    
}


?>
