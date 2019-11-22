<?php
require_once ("Controllers/EventosController.php");
require_once ("Controllers/CiudadesController.php");
require_once ("Controllers/ImagenesController.php");
require_once ("Controllers/UserController.php");
require_once ("Controllers/LoginController.php");


$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_EVENTOS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/eventos');
define("URL_CIUDADES", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/ciudades');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("URL_LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
define("URL_USUARIOS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/usuarios');

$eventosController = new EventosController();
$ciudadesController = new CiudadesController();
$imagenesController = new ImagenesController();
$userController = new UserController();
$loginController = new LoginController();

if($action == ''){
    $eventosController->ShowEventos();
}
else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "eventos"){
            if ((isset($partesURL[1]))&&($partesURL[1] == "insertar")){
                $eventosController->InsertarEvento();
            }  
            elseif ((isset($partesURL[1]))&&(isset($partesURL[2]))&&($partesURL[1] == "borrar")){
                $eventosController->BorrarEvento($partesURL[2]);
            }
            elseif ((isset($partesURL[1]))&&(isset($partesURL[2]))&&($partesURL[1] == "formeditar")){
                $eventosController->ShowEditarEvento($partesURL[2]);
            }
            elseif ((isset($partesURL[1]))&&(isset($partesURL[2]))&&($partesURL[1] == "editar")){
                $eventosController->EditarEvento($partesURL[2]);
            }
            elseif ((isset($partesURL[1]))&&(isset($partesURL[2]))&&($partesURL[1] == "detalles")){
                $eventosController->ShowDetallesEvento($partesURL[2]);
            }
            else{
                $eventosController->ShowEventos();
            }
        }
        elseif($partesURL[0] == "ciudades") {
            if ((isset($partesURL[1]))&&($partesURL[1] == "insertar")){
                $ciudadesController->InsertarCiudad();
            }  
            elseif ((isset($partesURL[1]))&&(isset($partesURL[2]))&&($partesURL[1] == "borrar")){
                $ciudadesController->BorrarCiudad($partesURL[2]);
            }
            elseif ((isset($partesURL[1]))&&(isset($partesURL[2]))&&($partesURL[1] == "formeditar")){
                $ciudadesController->ShowEditarCiudad($partesURL[2]);
            }
            elseif ((isset($partesURL[1]))&&(isset($partesURL[2]))&&($partesURL[1] == "editar")){
                $ciudadesController->EditarCiudad($partesURL[2]);
            }
            else{
                $ciudadesController->ShowCiudades();
            }
        }
        elseif($partesURL[0] == "imagenes") {
            if ((isset($partesURL[1]))&&($partesURL[1] == "insertar")){
                $imagenesController->InsertarImagen();
            }  
            elseif ((isset($partesURL[1]))&&(isset($partesURL[2]))&&($partesURL[1] == "borrar")){
                $imagenesController->BorrarImagen($partesURL[2]);
            }
        }
        elseif($partesURL[0] == "usuarios") {
            if ((isset($partesURL[1]))&&(isset($partesURL[2]))&&($partesURL[1] == "admin")){
                $userController->SwitchAdmin($partesURL[2]);
            }  
            elseif ((isset($partesURL[1]))&&(isset($partesURL[2]))&&($partesURL[1] == "borrar")){
                $userController->BorrarUsuario($partesURL[2]);
            }
            else{
                $userController->ShowUsuarios();
            }
        }
        elseif($partesURL[0] == "login") {
            $loginController->ShowLogin();
        }
        elseif($partesURL[0] == "iniciarsesion") {
            $loginController->IniciarSesion();
        }
        elseif($partesURL[0] == "logout") {
            $loginController->ShowLogout();
        }
        elseif($partesURL[0] == "register") {
            $userController->ShowRegister();
        }
        elseif($partesURL[0] == "newuser") {
            $userController->Register();
        }
    }
}
?>