<?php
require_once "./Models/EventosModel.php";
require_once "./Models/CiudadesModel.php";
require_once "./Controllers/UserController.php";
require_once "./Views/CiudadesView.php";

class CiudadesController {

    private $model;
    private $view;

	function __construct(){
        $this->model = new CiudadesModel();
        $this->userController = new UserController();
        $this->view = new CiudadesView();
    }

    public function ShowCiudades(){
        $ciudades = $this->model->GetCiudades();
        $this->view->DisplayCiudades($ciudades);
    }

    public function InsertarEvento(){
        $this->userController->checkLogIn();
        $this->model->InsertarEvento($_POST['nombre'],$_POST['fecha'],$_POST['organizador'],$_POST['ciudad']);
        header("Location: " . BASE_URL);
    }

    public function BorrarEvento($id){
        $this->userController->checkLogIn();
        $this->model->BorrarEvento($id);
        header("Location: " . BASE_URL);
    }
}


?>
