<?php

class EventosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe2_db;charset=utf8', 'root', '');
    }

    public function GetEventos(){
        $sentencia = $this->db->prepare("SELECT evento.*,ciudad.nombre AS ciudad FROM evento JOIN ciudad ON evento.id_ciudad=ciudad.id_ciudad");
        $sentencia->execute();
        $eventos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $eventos;
    }

    public function GetEventoById($id){
        $sentencia = $this->db->prepare("SELECT evento.*,ciudad.nombre AS ciudad FROM evento JOIN ciudad ON evento.id_ciudad=ciudad.id_ciudad WHERE id_evento=?");
        $sentencia->execute(array($id));
        $evento = $sentencia->fetch(PDO::FETCH_OBJ);
        return $evento;
    }
    
    public function GetEventosByIdCiudad($filter){
        $sentencia = $this->db->prepare("SELECT evento.*,ciudad.nombre AS ciudad FROM evento JOIN ciudad ON evento.id_ciudad=ciudad.id_ciudad WHERE evento.id_ciudad=?");
        $sentencia->execute(array($filter));
        $eventos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $eventos;
    }

    public function InsertarEvento($nombre,$fecha,$organizador,$id_ciudad ){
        $sentencia = $this->db->prepare("INSERT INTO evento(nombre, fecha, organizador, id_ciudad) VALUES(?,?,?,?)");
        $sentencia->execute(array($nombre,$fecha,$organizador,$id_ciudad));
        return $this->db->lastInsertId();
    }

    public function EditarEvento($id,$nombre,$fecha,$organizador,$ciudad){
        $sentencia = $this->db->prepare("UPDATE evento SET nombre=?, fecha=?, organizador=?, id_ciudad=? WHERE id_evento=?");
        $sentencia->execute(array($nombre,$fecha,$organizador,$ciudad,$id));
    }

    public function BorrarEvento($id){
        $sentencia = $this->db->prepare("DELETE FROM evento WHERE id_evento=?");
        $sentencia->execute(array($id));
    }
}
?>
