<?php
require_once("./Models/ComentariosModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class ComentariosApiController extends ApiController{
    
    public function __construct() {
        parent::__construct();
        $this->model = new ComentariosModel();        
    }

    public function ShowComentarios(){
        $comentarios = $this->model->getComentarios();
        $this->view->response($comentarios, 200);
    }


    public function InsertarComentario(){
        // $this->authHelper->checkLogIn();
        $comentario = $this->getData(); // la obtengo del body

        // inserta evento
        $comentarioId = $this->model->InsertarComentario($comentario->id_usuario,$comentario->comentario,$comentario->puntaje);

        // obtengo la recien creada
        $comentarioNuevo = $this->model->GetComentario($comentarioId);
        
        if ($comentarioNuevo)
            $this->view->response($comentarioNuevo, 200);
        else
            $this->view->response("Error al insertar el comentario", 500);
    }

    public function BorrarComentario($id){
        $this->authHelper->checkLogIn();
        $this->model->BorrarComentario($id);
        header("Location: " . BASE_URL);
    }


}
