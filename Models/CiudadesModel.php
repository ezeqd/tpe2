<?php

class CiudadesModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe2_db;charset=utf8', 'root', '');
    }

    public function GetCiudades(){
        $sentencia = $this->db->prepare( "select * from ciudad");
        $sentencia->execute();
        $ciudades = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $ciudades;
    }

    // public function InsertarEvento($nombre,$fecha,$organizador,$id_ciudad ){

    //     $sentencia = $this->db->prepare("INSERT INTO evento(nombre, fecha, organizador, id_ciudad) VALUES(?,?,?,?)");
    //     $sentencia->execute(array($nombre,$fecha,$organizador,$id_ciudad));
    // }

    // public function BorrarEvento($id){
    //     $sentencia = $this->db->prepare("DELETE FROM evento WHERE id=?");
    //     $sentencia->execute(array($id));
    // }
}

?>
