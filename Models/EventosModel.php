<?php

class EventosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe2_db;charset=utf8', 'root', '');
    }

	public function GetEventos(){
        $sentencia = $this->db->prepare( "select * from evento");
        $sentencia->execute();
        $eventos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $eventos;
    }	

    public function GetCiudades(){
        $sentencia = $this->db->prepare( "select * from ciudad");
        $sentencia->execute();
        $ciudades = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $ciudades;
    }

    public function InsertarEvento($nombre,$fecha,$organizador,$id_ciudad ){

        $sentencia = $this->db->prepare("INSERT INTO evento(nombre, fecha, organizador, id_ciudad) VALUES(?,?,?,?)");
        $sentencia->execute(array($nombre,$fecha,$organizador,$id_ciudad));
    }

    // public function FinalizarTarea($id){
    //     $sentencia =  $this->db->prepare("UPDATE tarea SET finalizada=1 WHERE id=?");
    //     $sentencia->execute(array($id));
    // }

    // public function BorrarTarea($id){
    //     $sentencia = $this->db->prepare("DELETE FROM tarea WHERE id=?");
    //     $sentencia->execute(array($id));
    // }
}

?>
