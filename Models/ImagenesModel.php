<?php

class ImagenesModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe2_db;charset=utf8', 'root', '');
    }

    public function GetImagenes ($id = null){
        $sentencia = $this->db->prepare("SELECT * FROM imagen WHERE id_evento=?");
        $sentencia->execute(array($id));
        $urlImagen = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $urlImagen;
    }

    public function InsertarImagen ($imagen,$id_evento){
        $filepath = null;
        if ($imagen){
            $filepath = $this->moveFile($imagen);
        }
        $sentencia = $this->db->prepare("INSERT INTO imagen(id_evento,url_imagen) VALUES(?,?)");
        $sentencia->execute(array($id_evento,$filepath));
        // var_dump($sentencia->errorInfo()); die();
    }

    public function moveFile ($imagen){
        $filepath = "imagenes/eventos/" . uniqid() . "." . pathinfo($imagen['name'], PATHINFO_EXTENSION);
        move_uploaded_file($imagen['tmp_name'], $filepath);
        return $filepath;
    }

    public function BorrarImagen ($id){
        $sentencia = $this->db->prepare("DELETE FROM imagen WHERE id_imagen=?");
        $sentencia->execute(array($id));
    }
}
?>
