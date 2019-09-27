<?php
require_once "Controllers/EventosController.php";

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$controller = new EventosController();

if($action == ''){
    $controller->ShowEventos();
}
else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "eventos"){
            $controller->ShowEventos();
        }
        elseif($partesURL[0] == "ciudades") {
            $controller->ShowCiudades();
        }
        // }elseif($partesURL[0] == "borrar") {
        //     $controller->BorrarTarea($partesURL[1]);
        // }
    }
}
?>