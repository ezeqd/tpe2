<?php

require_once ("Router.php");
require_once ("api/ComentariosApiController.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("comentarios/:ID", "GET", "ComentariosApiController", "GetComentario");
$router->addRoute("comentarios/promedio/:ID", "GET", "ComentariosApiController", "GetPromedioPuntajeByEvento");
$router->addRoute("comentarios/eventos/:ID", "GET", "ComentariosApiController", "ShowComentarios");
$router->addRoute("comentarios", "POST", "ComentariosApiController", "InsertarComentario");
$router->addRoute("comentarios/:ID", "DELETE", "ComentariosApiController", "BorrarComentario");


// rutea
$router->route($resource, $method);

?>