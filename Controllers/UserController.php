<?php
require_once "./Models/UserModel.php";
require_once "./Views/UserView.php";
require_once "./Helpers/Authenticate.Helper.php";
require_once "./Helpers/Mailer.php";

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

    public function SetPass(){
        $hash = $_POST['hash'];
        if ((isset($_POST['newpass1']))&&(isset($_POST['newpass2']))&&($_POST['newpass1']==$_POST['newpass2'])){
            $pass = $_POST['newpass1'];
            $password = password_hash($pass, PASSWORD_DEFAULT);
            // decodificar hash y mandar ID usuario con pass al model
            die();
            $id = 
            $this->model->UpdatePass($id,$password);

        }
        else{
            $this->view->DisplaySetPass($hash,"Ingrese contraseñas idénticas");
        }
    }

    public function ShowSetPass(){
        if (isset ($_GET['id'])){
            $this->view->DisplaySetPass($_GET['id']);
        }
        else{
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
<<<<<<< HEAD
                $hash = $crypt->hash($user->id_usuario);
=======
                $hash = "asd123";
>>>>>>> 1edf3b20218e5b12813e1652ff7098b16ec5304d
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
