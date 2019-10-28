<?php
require_once "./Models/UserModel.php";
require_once "./Views/UserView.php";
require_once "./Helpers/Authenticate.Helper.php";

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
        $hash = password_hash($password, PASSWORD_DEFAULT);
        // var_dump($hash);
        // var_dump($usuario);

        if (isset($usuario) && $usuario != null && password_verify($hash, $usuario->password)){
            session_start();
            $_SESSION['usuario'] = $usuario->email;
            $_SESSION['userId'] = $usuario->id_usuario;
            header("Location: " . URL_EVENTOS);
            $this->view->DisplayLogin("Iniciaste Sesión re piola");
        } else {
            $this->view->DisplayLogin("Error en inicio de Sesión");
        }
       // header("Location: " . BASE_URL);
    }

    public function Register(){
        $password = $_POST['password'];
        $user = $_POST['usuario'];

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $model->SetUser($user, $password);
    }

    public function ShowLogin(){
        $this->view->DisplayLogin();
    }

    public function ShowLogout(){
        session_start();
        session_destroy();
        header("Location: " . URL_LOGIN);
    }

    public function ShowRegister(){
        $this->view->DisplayRegister();
    }

    

    
}
?>
