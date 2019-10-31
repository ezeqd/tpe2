<?php
require_once "./Models/CiudadesModel.php";
require_once "./Helpers/Authenticate.Helper.php";
require_once "./Views/CiudadesView.php";

class CiudadesController {

    private $model;
    private $view;
    private $authHelper;

	function __construct(){
        $this->model = new CiudadesModel();
        $this->view = new CiudadesView();
        $this->authHelper = new AuthHelper();
    }

    public function ShowCiudades(){
        $ciudades = $this->model->GetCiudades();
        $this->view->DisplayCiudades($ciudades);
    }

    public function InsertarCiudad(){
        $this->authHelper->checkLogIn();
        $this->model->InsertarCiudad($_POST['nombre'],$_POST['capacidad']);
        header("Location: " . URL_CIUDADES);
    }
    
    public function ShowEditarCiudad($id){
        $this->authHelper->checkLogIn();
        $ciudad = $this->model->GetCiudadById($id);
        $this->view->DisplayEditarCiudad($ciudad);
    }

    public function EditarCiudad($id){
        $this->authHelper->checkLogIn();
        $this->model->EditarCiudad($id, $_POST['nombre'],$_POST['capacidad']);
        header("Location: " . URL_CIUDADES);
    }

    public function BorrarCiudad($id){
        $this->authHelper->checkLogIn();
        $this->model->BorrarCiudad($id);
        header("Location: " . URL_CIUDADES);
    }
}


?>
