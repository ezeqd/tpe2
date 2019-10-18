<?php
require_once("./Models/EventosModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class EventosApiController extends ApiController{
    
    public function __construct() {
        parent::__construct();
        $this->model = new EventosModel();        
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
        $this->view->response($eventos, 200);
    }

    /**
     * Obtiene una tarea dado un ID
     * 
     * $params arreglo asociativo con los parámetros del recurso
     */
    // public function getTarea($params = null) {
    //     // obtiene el parametro de la ruta
    //     $id = $params[':ID'];
        
    //     $tarea = $this->model->GetTarea($id);
        
    //     if ($tarea) {
    //         $this->view->response($tarea, 200);   
    //     } else {
    //         $this->view->response("No existe la tarea con el id={$id}", 404);
    //     }
    // }

    // EventosApiController.php
    public function deleteTask($params = []) {
        $task_id = $params[':ID'];
        $task = $this->model->GetTarea($task_id);

        if ($task) {
            $this->model->BorrarTarea($task_id);
            $this->view->response("Tarea id=$task_id eliminada con éxito", 200);
        }
        else 
            $this->view->response("Task id=$task_id not found", 404);
    }

    // TareaApiController.php
   public function addTask($params = []) {     
        $body = $this->getData();

        // inserta la tarea
        $titulo = $body->titulo;
        $descripcion = $body->descripcion;
        $prioridad = $body->prioridad;
        $tarea = $this->model->InsertarTarea($titulo,$descripcion,$prioridad,0 );
    }

    // TaskApiController.php
    public function updateTask($params = []) {
        $task_id = $params[':ID'];
        $task = $this->model->GetTarea($task_id);

        if ($task) {
            $body = $this->getData();
            $titulo = $body->titulo;
            $descripcion = $body->descripcion;
            $prioridad = $body->prioridad;
            $tarea = $this->model->ActualizarTarea($task_id, $titulo, $descripcion, $prioridad);
            $this->view->response("Tarea id=$task_id actualizada con éxito", 200);
        }
        else 
            $this->view->response("Task id=$task_id not found", 404);
    }


}
