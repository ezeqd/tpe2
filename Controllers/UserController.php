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
        if (isset($_POST['newpass1']))&&(isset($_POST['newpass2'])&&($_POST['newpass1']==$_POST['newpass2'])){
            $pass = $_POST['newpass1'];
            $hash = $_GET['id'];
        }
        // decodificar hash y mandar ID usuario con pass al model
        $hash = 
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $id = ;
        $this->model->UpdatePass($id,$password);
    }

    public function ShowSetPass(){
        $this->view->DisplaySetPass();
    }

    public function Recovery(){
        if(isset($_POST['lost-user'])){
            $user = $this->model->getUsuario($_POST['lost-user']);
            if ($user){
                $uniqidStr = md5(uniqid(mt_rand()));
                $receiver = $user->email;
                $subject = "Recuperar contraseña";
                $hash = "asd123";
                $url = BASE_URL . "/showsetpass?id=". $hash;
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
//instanciamos un objeto de la clase phpmailer al que llamamos 
//   //por ejemplo mail
//  //Definimos las propiedades y llamamos a los métodos 
//   //correspondientes del objeto mail

//   //Con PluginDir le indicamos a la clase phpmailer donde se 
//   //encuentra la clase smtp que como he comentado al principio de 
//   //este ejemplo va a estar en el subdirectorio includes
//   $mail->PluginDir = "Helpers/PHPMailer";

//   //Con la propiedad Mailer le indicamos que vamos a usar un 
//   //servidor smtp
//   $mail->Mailer = "smtp";

//   //Asignamos a Host el nombre de nuestro servidor smtp
//   $mail->Host = "smtp.gmail.com";

//   //Le indicamos que el servidor smtp requiere autenticación
//   $mail->SMTPAuth = true;

//   //Le decimos cual es nuestro nombre de usuario y password
//   $mail->Username = "contacto@cuchillosdetandil.com.ar"; 
//   $mail->Password = "acero1045";

//   //Indicamos cual es nuestra dirección de correo y el nombre que 
//   //queremos que vea el usuario que lee nuestro correo
//   $mail->From = "micuenta@HotPOP.com";
//   $mail->FromName = "Eduardo Garcia";

//   //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
//   //una cuenta gratuita, por tanto lo pongo a 30  
//   $mail->Timeout=30;

//   //Indicamos cual es la dirección de destino del correo
//   $mail->AddAddress($user->email);

//   //Asignamos asunto y cuerpo del mensaje
//   //El cuerpo del mensaje lo ponemos en formato html, haciendo 
//   //que se vea en negrita
//   $mail->Subject = "Prueba de phpmailer";
//   $mail->Body = "<b>Mensaje de prueba mandado con phpmailer en formato html</b>";

//   //Definimos AltBody por si el destinatario del correo no admite email con formato html 
//   $mail->AltBody = "Mensaje de prueba mandado con phpmailer en formato solo texto";

//   //se envia el mensaje, si no ha habido problemas 
//   //la variable $exito tendra el valor true
//   $exito = $mail->Send();

//   //Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
//   //para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
//   //del anterior, para ello se usa la funcion sleep	
//   $intentos=1; 
//   while ((!$exito) && ($intentos < 5)) {
// 	sleep(5);
//      	echo $mail->ErrorInfo;
//      	$exito = $mail->Send();
//      	$intentos=$intentos+1;	
	
//    }
 
		
//    if(!$exito)
//    {
// 	echo "Problemas enviando correo electrónico a ".$valor;
// 	echo "<br/>".$mail->ErrorInfo;	
//    }
//    else
//    {
// 	echo "Mensaje enviado correctamente";
//    } 
//         //aca debo enviar mail al $user

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
