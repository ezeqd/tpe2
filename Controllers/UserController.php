<?php
require_once "./Models/UserModel.php";
require_once "./Views/UserView.php";
require_once "./helpers/authenticate.helper.php"

class UserController {

    private $model;
    private $view;
    private $authHelper;

	function __construct(){
        $this->model = new UserModel();
        $this->view = new UserView();
        $this->authHelper = new authHelper();
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
        } else {
            $this->view->DisplayLogin("Error en inicio de Sesión");
        }
       // header("Location: " . BASE_URL);
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
