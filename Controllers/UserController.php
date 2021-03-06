<?php
require_once "./Models/UserModel.php";
require_once "./Views/UserView.php";
require_once "./Helpers/Authenticate.Helper.php";
require_once "./Helpers/Mailer.php";
require_once "./Helpers/Encryption.php";

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
        $usuario = $this->model->GetUsuario($user);
        if (empty($usuario)){
            $this->model->SetUser($user, $hash);
            $this->authHelper->login($usuario);
            header("Location: " . BASE_URL);
        } else {
            $this->view->DisplayRegister("Email ya registrado");
        }
    }

    public function ShowRecovery(){
        $this->view->DisplayRecovery();
    }

    public function SetPass(){
        $hash = $_POST['hash'];
        if ((isset($_POST['newpass1']))&&(isset($_POST['newpass2']))&&($_POST['newpass1']==$_POST['newpass2'])){
            $pass = $_POST['newpass1'];
            $password = password_hash($pass, PASSWORD_DEFAULT);
            // decodificar hash y mandar ID usuario con pass al model
            $crypt = new Encryption();

            $id = $crypt->decrypt($hash);
            if(!empty($this->model->GetUsuarioById($id))){
                $this->model->UpdatePass($id,$password);
            }
        } else {
            $this->view->DisplaySetPass($hash,"Ingrese contraseñas idénticas");
        }
    }

    public function ShowSetPass(){
        if (isset ($_GET['id'])){
            $this->view->DisplaySetPass($_GET['id']);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function Recovery(){
        if(isset($_POST['lost-user'])){
            $user = $this->model->getUsuario($_POST['lost-user']);
            if ($user){
                $crypt = new Encryption();
                $receiver = $user->email;
                $subject = "Recuperar contraseña";
                $hash = $crypt->encrypt($user->id_usuario);
                $url = BASE_URL . "showsetpass?id=". $hash;
                $body = "Estimado usuario ingrese al siguiente link para cambiar la contraseña " . $url;
                $mail = new Mailer($receiver,$subject, $body);
                $error = $mail->sendMail();
                if (empty($error)) {
                    $this->view->DisplayRecovery("Mail enviado correctamente");
                } else {
                    $this->view->DisplayRecovery("Falló el envío de mail. Intente nuevamente");
                }
            } else {
                $this->view->DisplayRecovery("Mail no valido");
            }
        }
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
