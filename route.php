<?php
require_once ("Controllers/EventosController.php");
require_once ("Controllers/CiudadesController.php");
require_once ("Controllers/UserController.php");

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_EVENTOS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/eventos');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("URL_LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

$eventosController = new EventosController();
$ciudadesController = new CiudadesController();
$userController = new userController();

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
                // var_dump($partesURL[2]);
            }
            else{
                $eventosController->ShowEventos();
            }
        }
        elseif($partesURL[0] == "ciudades") {
            $ciudadesController->ShowCiudades();
        }
        elseif($partesURL[0] == "login") {
            $userController->ShowLogin();
        }
        elseif($partesURL[0] == "iniciarsesion") {
            $userController->IniciarSesion();
        }
        elseif($partesURL[0] == "logout") {
            $userController->ShowLogout();
        }
    }
}
?>