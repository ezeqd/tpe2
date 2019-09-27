<?php
require_once "Controllers/EventosController.php";
require_once "Controllers/CiudadesController.php";

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$eventosController = new EventosController();
$ciudadesController = new CiudadesController();

if($action == ''){
    $eventosController->ShowEventos();
}
else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "eventos"){
            $eventosController->ShowEventos();
            // if (isset($partesURL[1])&&($partesURL[1]="Insertar"){
                //     $controller->ShowEventos();
                // }  
        }
        elseif($partesURL[0] == "ciudades") {
            $ciudadesController->ShowCiudades();
        }
        // }elseif($partesURL[0] == "borrar") {
        //     $controller->BorrarTarea($partesURL[1]);
        // }
    }
}
?>