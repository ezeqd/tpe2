<?php
require_once("./Models/CiudadesModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class CiudadesApiController extends ApiController{
  
    public function __construct() {
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input"); 
        $this->model = new CiudadesModel();
    }

    public function ShowCiudades(){
        $ciudades = $this->model->GetCiudades();
        $this->view->response($ciudades, 200);
    }

    // public function InsertarEvento(){
    //     $this->model->InsertarEvento($_POST['nombre'],$_POST['fecha'],$_POST['organizador'],$_POST['ciudad']);
    //     header("Location: " . BASE_URL);
    // }
}

