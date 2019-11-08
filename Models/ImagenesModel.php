<?php

class ImagenesModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe2_db;charset=utf8', 'root', '');
    }

    public function GetEventos(){
        // $sentencia = $this->db->prepare("SELECT evento.*,ciudad.nombre AS ciudad FROM evento JOIN ciudad ON evento.id_ciudad=ciudad.id_ciudad");
        // $sentencia->execute();
        // $eventos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        // return $eventos;
    }

    public function InsertarImagen ($imagen = null){
        var_dump($imagen); 
        $filepath = null;
        if ($imagen){
            $filepath = $this->moveFile($imagen);
        }
        $sentencia = $this->db->prepare("INSERT INTO imagen(url_imagen) VALUES(?)");
        $sentencia->execute(array($filepath));
        var_dump($sentencia->errorInfo()); die();
    }

    public function moveFile ($imagen){
        $filepath = "imagenes/eventos/" . uniqid() . "." . pathinfo($imagen['name'], PATHINFO_EXTENSION);
        move_uploaded_file($imagen['tmp_name'], $filepath);
        return $filepath;
    }
}
?>
