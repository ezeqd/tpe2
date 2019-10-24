<?php

class EventosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe2_db;charset=utf8', 'root', '');
    }

    public function GetEventos(){
        $sentencia = $this->db->prepare( "SELECT * FROM evento");
        $sentencia->execute();
        $eventos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $eventos;
    }
    // En Controller de Eventos creamos el model de ciudades para consultarle a ese model las ciudades y no copiar codigo acá 
    // public function GetCiudades(){
    //     $sentencia = $this->db->prepare( "SELECT * FROM ciudad");
    //     $sentencia->execute();
    //     $ciudades = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //     return $ciudades;
    // }

    public function InsertarEvento($nombre,$fecha,$organizador,$id_ciudad ){
        $sentencia = $this->db->prepare("INSERT INTO evento(nombre, fecha, organizador, id_ciudad) VALUES(?,?,?,?)");
        $sentencia->execute(array($nombre,$fecha,$organizador,$id_ciudad));
    }

    public function EditarEvento($id,$nombre,$fecha,$organizador,$ciudad){
        $sentencia = $this->db->prepare("UPDATE evento SET nombre=?, fecha=?, organizador=?, ciudad=? WHERE id_evento=?");
        $sentencia->execute(array($nombre,$fecha,$organizador,$ciudad,$id));
    }

    public function BorrarEvento($id){
        $sentencia = $this->db->prepare("DELETE FROM evento WHERE id_evento=?");
        $sentencia->execute(array($id));
    }
}
?>
