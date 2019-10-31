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

    public function GetIdCiudadByName($name){
        $sentencia = $this->db->prepare( "SELECT id_ciudad from ciudad WHERE nombre=?");
        $sentencia->execute(array($name));
        $id_ciudad = $sentencia->fetch(PDO::FETCH_OBJ);
        return $id_ciudad;
    }

    public function GetCiudadById($id){
        $sentencia = $this->db->prepare("SELECT * FROM ciudad WHERE id_ciudad=?");
        $sentencia->execute(array($id));
        $evento = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $evento[0];
    }

    public function InsertarCiudad($nombre,$capacidad){
        $sentencia = $this->db->prepare("INSERT INTO ciudad(nombre, capacidad) VALUES(?,?)");
        $sentencia->execute(array($nombre,$capacidad));
    }

    public function EditarCiudad($id,$nombre,$capacidad){
        $sentencia = $this->db->prepare("UPDATE ciudad SET nombre=?, capacidad=? WHERE id_ciudad=?");
        $sentencia->execute(array($nombre,$capacidad,$id));
    }

    public function BorrarCiudad($id){
        $sentencia = $this->db->prepare("DELETE FROM ciudad WHERE id_ciudad=?");
        $sentencia->execute(array($id));
    }

}

?>
