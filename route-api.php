<?php

require_once ("Router.php");
require_once ("api/EventosApiController.php");
require_once ("api/CiudadesApiController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("eventos", "GET", "EventosApiController", "ShowEventos");
$router->addRoute("ciudades", "GET", "CiudadesApiController", "ShowCiudades");
$router->addRoute("eventos", "POST", "EventosApiController", "InsertarEvento");
// $router->addRoute("tareas/:ID", "DELETE", "TareasApiController", "deleteTask");
// $router->addRoute("tareas/:ID", "PUT", "TareasApiController", "updateTask");


// rutea
$router->route($resource, $method);

?>