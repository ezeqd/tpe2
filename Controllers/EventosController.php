<?php
require_once "./Models/EventosModel.php";
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
        $this->view->DisplayEventos($eventos);
    }

    public function ShowCiudades(){
        $ciudades = $this->model->GetCiudades();
        $this->view->DisplayCiudades($ciudades);
    }

    // public function InsertarTarea(){
    //     $finalziada = 0;
    //     if($_POST['finalizada'] == 'on'){
    //         $finalziada = 1;
    //     }
    //     $this->model->InsertarTarea($_POST['titulo'],$_POST['descripcion'],$_POST['prioridad'],$finalziada );
    //     header("Location: " . BASE_URL);
    // }

    // public function FinalizarTarea($id){
    //     $this->model->FinalizarTarea($id);
    //     header("Location: " . BASE_URL);
    // }

    // public function BorrarTarea($id){
    //     $this->model->BorrarTarea($id);
    //     header("Location: " . BASE_URL);
    // }
}


?>
