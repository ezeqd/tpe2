<?php
require_once "./Models/ImagenesModel.php";
require_once "./Helpers/Authenticate.Helper.php";
class ImagenesController {

    private $model;
    // private $view;
    private $authHelper;

	function __construct(){
        $this->model = new ImagenesModel();
        // $this->view = new ImagenesView();
        $this->authHelper = new AuthHelper();
    }
    
    public function InsertarImagen(){
        $this->authHelper->checkLogIn();
        $id = $_POST['id'];
        if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
            $this->model->InsertarImagen($_FILES['imagen'],$id);
        }
        header("Location: " . URL_EVENTOS . "/detalles/".$id);
    }

    public function BorrarImagen($id){
        $this->authHelper->checkLogInAdmin();
        $id_evento = $_POST['id'];
        $this->model->BorrarImagen($id);
        header("Location: " . URL_EVENTOS . "/detalles/". $id_evento);
    }
}
?>
