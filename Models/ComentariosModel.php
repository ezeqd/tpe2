<?php

class ComentariosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe2_db;charset=utf8', 'root', '');
    }

    public function GetComentarios($id = null){
        if(isset($id)){
            $sentencia = $this->db->prepare("SELECT * FROM comentario WHERE id_evento=?");
            $sentencia->execute(array($id));
        }
        else {
            $sentencia = $this->db->prepare("SELECT * FROM comentario");
            $sentencia->execute();
        }
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    public function GetComentarioById($id){
        $sentencia = $this->db->prepare("SELECT * FROM comentario WHERE id_comentario=?");
        $sentencia->execute(array($id));
        $comentario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $comentario;
    }
    
    public function InsertarComentario($id_usuario,$comentario,$puntaje){
        $sentencia = $this->db->prepare("INSERT INTO comentario(id_usuario, comentario, puntaje) VALUES(?,?,?)");
        $sentencia->execute(array($id_usuario,$comentario,$puntaje));
        return $this->db->lastInsertId();
    }

    public function BorrarComentario($id){
        $sentencia = $this->db->prepare("DELETE FROM comentario WHERE id_comentario=?");
        $sentencia->execute(array($id));
    }
}
?>
