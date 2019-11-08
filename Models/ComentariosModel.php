<?php

class ComentariosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe2_db;charset=utf8', 'root', '');
    }

    public function GetComentarios(){
        $sentencia = $this->db->prepare("SELECT * FROM comentario");
        $sentencia->execute();
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    public function GetComentarioById($id){
        $sentencia = $this->db->prepare("SELECT evento.*,ciudad.nombre AS ciudad FROM evento JOIN ciudad ON evento.id_ciudad=ciudad.id_ciudad WHERE id_evento=?");
        $sentencia->execute(array($id));
        $evento = $sentencia->fetch(PDO::FETCH_OBJ);
        return $evento;
    }
    
    public function InsertarComentario($id_usuario,$comentario,$puntaje){
        $sentencia = $this->db->prepare("INSERT INTO comentario(id_usuario, comentario, puntaje) VALUES(?,?,?)");
        $sentencia->execute(array($id_usuario,$comentario,$puntaje));
    }

    public function BorrarComentario($id){
        $sentencia = $this->db->prepare("DELETE FROM evento WHERE id_evento=?");
        $sentencia->execute(array($id));
    }
}
?>
