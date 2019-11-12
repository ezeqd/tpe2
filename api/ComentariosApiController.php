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
        if(isset($params)){
            $id = $params[':ID'];
            $comentarios = $this->model->GetComentarios($id);
        }
        else {
            $comentarios = $this->model->GetComentarios();
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

    public function InsertarComentario(){
        // $this->authHelper->checkLogIn();
        $comentario = $this->getData(); // la obtengo del body

        // inserta evento
        $comentarioId = $this->model->InsertarComentario($comentario->id_usuario,$comentario->comentario,$comentario->puntaje);

        // obtengo la recien creada
        $comentarioNuevo = $this->model->GetComentarioById($comentarioId);
        
        if ($comentarioNuevo)
            $this->view->response($comentarioNuevo, 200);
        else
            $this->view->response("Error al insertar el comentario", 500);
    }

    public function BorrarComentario($params){
        // $this->authHelper->checkLogIn();
        // $this->authHelper->checkAdmin();
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
