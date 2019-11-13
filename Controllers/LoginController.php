<?php
require_once "./Models/UserModel.php";
require_once "./Views/UserView.php";
require_once "./Helpers/Authenticate.Helper.php";

class LoginController {

    private $model;
    private $view;
    private $authHelper;

	function __construct(){
        $this->model = new UserModel();
        $this->view = new UserView();
        $this->authHelper = new authHelper();
    }
    
    public function ShowLogin(){
        $this->view->DisplayLogin();
    }

    public function IniciarSesion(){

        $password = $_POST['password'];
        $usuario = $this->model->GetUsuario($_POST['usuario']);

        if (!empty($usuario) && password_verify($password, $usuario->password)){
            $this->authHelper->login($usuario);
            header("Location: " . URL_EVENTOS);
        } else {
            $this->view->DisplayLogin("Error en inicio de Sesión");
        }
    }
    
    public function ShowLogout(){
        session_start();
        session_destroy();
        header("Location: " . URL_LOGIN);
    }
}
?>
