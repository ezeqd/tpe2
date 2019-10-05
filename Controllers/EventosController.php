<?php
require_once "./Models/EventosModel.php";
require_once "./Models/CiudadesModel.php";
require_once "./Views/EventosView.php";

class EventosController {

    private $model;
    private $view;

	function __construct(){
        $this->model = new EventosModel();
        $this->view = new EventosView();
    }

    public function ShowEventos(){
        $eventos = $this->model->GetEventos();
        $ciudades = $this->model->GetCiudades();
        foreach ($eventos as $evento){
            $id = $evento->id_ciudad;
            foreach ($ciudades as $ciudad){
                if ($ciudad->id_ciudad == $id){
                    $evento->ciudad = $ciudad->nombre;
                }
            }
        }
        $this->view->DisplayEventos($eventos);
    }

    public function InsertarEvento(){
        $this->model->InsertarEvento($_POST['nombre'],$_POST['fecha'],$_POST['organizador'],$_POST['ciudad']);
        header("Location: " . BASE_URL);
    }

    public function BorrarEvento($id){
        $this->model->BorrarEvento($id);
        header("Location: " . BASE_URL);
    }
}
?>
