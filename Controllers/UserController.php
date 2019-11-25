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
    
    public function SwitchAdmin($id){
        $this->authHelper->CheckLogInAdmin();
        $usuario = $this->model->GetUsuarioById($id);
        $admin = (int)!$usuario->admin;
        // var_dump($admin);die();

        $this->model->SwitchAdmin($admin,$usuario);
        header("Location: " . URL_USUARIOS);    
    }

    public function ShowRegister(){
        $this->view->DisplayRegister();
    }
    
    public function Register(){
        $password = $_POST['password'];
        $user = $_POST['usuario'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->model->SetUser($user, $hash);
        $usuario = $this->model->GetUsuario($user);
        $this->authHelper->login($usuario);
        header("Location: " . BASE_URL);    
    }

    public function ShowRecovery(){
        $this->view->DisplayRecovery();
    }

    public function Recovery(){
        $lostUser = $_POST['lost-user'];
        $user = $this->model->getUsuario($lostUser);
        //aca debo enviar mail al $user

    }

    public function BorrarUsuario($id){
        $this->authHelper->CheckLogInAdmin();
        $this->model->BorrarUsuario($id);
        header("Location: " . URL_USUARIOS);    
    }

    public function ShowUsuarios(){
        $this->authHelper->CheckLogIn();
        $usuarios = $this->model->GetUsuarios();
        $email = $this->authHelper->getLoggedUserName();
        if (isset ($email)){
            $usuario = $this->model->GetUsuario($email);
        }
        $this->view->DisplayUsuarios($usuarios,$usuario);

    }
}
?>
