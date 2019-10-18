<?php
require_once ("Controllers/EventosController.php");
require_once ("Controllers/CiudadesController.php");
require_once ("Controllers/UserController.php");

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
// define("URL_TAREAS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/tareas');
// define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
// define("URL_LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

$eventosController = new EventosController();
$ciudadesController = new CiudadesController();

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
            else {
                $eventosController->ShowEventos();
            }
        }
        elseif($partesURL[0] == "ciudades") {
            $ciudadesController->ShowCiudades();
        }

        // }elseif($partesURL[0] == "borrar") {
        //     $controller->BorrarTarea($partesURL[1]);
        // }

        // elseif($partesURL[0] == "login") {
        //     $controllerUser = new UserController();
        //     $controllerUser->Login();
        // }
        // elseif($partesURL[0] == "iniciarSesion") {
        //     $controllerUser = new UserController();
        //     $controllerUser->IniciarSesion();
        // }
        // elseif($partesURL[0] == "logout") {
        //     $controllerUser = new UserController();
        //     $controllerUser->Logout();
        // }

    }
}
?>