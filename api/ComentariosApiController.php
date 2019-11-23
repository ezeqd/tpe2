<?php
require_once("./Models/ComentariosModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class ComentariosApiController extends ApiController{
    
    public function __construct() {
        parent::__construct();
        $this->model = new ComentariosModel();        
    }

    public function ShowComentarios($params = null){
        $atributo = "fecha";
        $orden = "DESC";
        if ((isset($_GET["atributo"]))&& isset(($_GET["orden"]))){
            $atributo = $_GET["atributo"];
            $orden = $_GET["orden"];
        }
        if(isset($params)){
            $id = $params[':ID'];
            $comentarios = $this->model->GetComentarios($id,$atributo,$orden);
            // var_dump($orden);die();
        }
        else{
            $comentarios = $this->model->GetComentarios($atributo,$orden);
        }
        $this->view->response($comentarios, 200);
    }
        

    public function GetComentario($params = null) {
        // obtiene el parametro de la ruta
        if(isset($params)){
            $id = $params[':ID'];
            $comentario = $this->model->GetComentarioById($id);
        }
        if ($comentario) {
            $this->view->response($comentario, 200);   
        } else {
            $this->view->response("No existe la tarea con el id={$id}", 404);
        }
    }

    public function GetPromedioPuntajeByEvento($params = null){
        $id = $params[':ID'];
        $promedio = $this->model->GetPromedioPuntajeByEvento($id);
        if ($promedio) {
            $this->view->response($promedio, 200);   
        } else {
            $this->view->response("No existen puntajes para calcular el promedio para el evento con id={$id}", 404);
        }
    }

    public function InsertarComentario(){
        // $this->authHelper->checkLogIn();
        $comentario = $this->getData(); // la obtengo del body
        
        // inserta evento
        $comentarioId = $this->model->InsertarComentario($comentario->id_usuario,$comentario->id_evento,$comentario->comentario,$comentario->puntaje,atributo,orden);
        
        // obtengo la recien creada
        $comentarioNuevo = $this->model->GetComentarioById($comentarioId);
        
        if ($comentarioNuevo)
            $this->view->response($comentarioNuevo, 200);
        else
            $this->view->response("Error al insertar el comentario", 500);
    }

    public function BorrarComentario($params){
        // $this->authHelper->CheckLoginAdmin();
        $id = $params[':ID'];
        $comentario = $this->model->GetComentarioById($id);

        if ($comentario) {
            $this->model->BorrarComentario($id);
            $this->view->response("Comentario id=$id eliminado con éxito", 200);
        }
        else 
            $this->view->response("Comentario id=$id not found", 404);
    }
}
