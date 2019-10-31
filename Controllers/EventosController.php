<?php
require_once "./Models/EventosModel.php";
require_once "./Models/CiudadesModel.php";
require_once "./Helpers/Authenticate.Helper.php";
require_once "./Views/EventosView.php";

class EventosController {

    private $model;
    private $ciudadesmodel;
    private $view;
    private $authHelper;

	function __construct(){
        $this->model = new EventosModel();
        $this->ciudadesmodel = new CiudadesModel();
        $this->view = new EventosView();
        $this->authHelper = new AuthHelper();
    }

    public function ShowEventos(){
        $filter = null;
        $filterId = null;
        $id = null;
        if (isset($_GET['filter'])){
            $filter = $_GET['filter'];
            $filterId = $this->ciudadesmodel->GetIdCiudadByName($filter);
            $id = $filterId->id_ciudad;
            $eventos = $this->model->GetEventosByIdCiudad($id);
        }
        else{
            $eventos = $this->model->GetEventos();
        }
        $ciudades = $this->ciudadesmodel->GetCiudades();
        $this->view->DisplayEventos($eventos,$ciudades);
    }

    public function InsertarEvento(){
        $this->authHelper->checkLogIn();
        $this->model->InsertarEvento($_POST['nombre'],$_POST['fecha'],$_POST['organizador'],$_POST['ciudad']);
        header("Location: " . BASE_URL);
    }

    public function ShowEditarEvento($id){
        $this->authHelper->checkLogIn();
        $evento = $this->model->GetEventoById($id);
        $ciudades = $this->ciudadesmodel->GetCiudades();
        $this->view->DisplayEditarEvento($evento,$ciudades);
    }

    public function ShowDetallesEvento($id){
        $evento = $this->model->GetEventoById($id);
        $ciudades = $this->ciudadesmodel->GetCiudades();
        $this->view->DisplayDetallesEvento($evento,$ciudades);
    }

    public function EditarEvento($id){
        $this->authHelper->checkLogIn();
        $this->model->EditarEvento($id, $_POST['nombre'],$_POST['fecha'],$_POST['organizador'],$_POST['ciudad']);
        header("Location: " . BASE_URL);
    }

    public function BorrarEvento($id){
        $this->authHelper->checkLogIn();
        $this->model->BorrarEvento($id);
        header("Location: " . BASE_URL);
    }
}
?>
