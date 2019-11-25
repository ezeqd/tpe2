<?php

class ComentariosModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe2_db;charset=utf8', 'root', '');
    }

    public function GetComentarios($id = null, $atributo,$orden){
        if(isset($id)){
            $sentencia = $this->db->prepare("SELECT comentario.*,usuario.email AS usuario FROM comentario JOIN usuario ON comentario.id_usuario=usuario.id_usuario WHERE id_evento=? ORDER BY $atributo $orden");
            $sentencia->execute(array($id));
            // var_dump($sentencia->errorInfo()); die();
        }
        else {
            $sentencia = $this->db->prepare("SELECT * FROM comentario ORDER BY $atributo $orden");
            $sentencia->execute(array());
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

    public function GetPromedioPuntajeByEvento($id){
        $sentencia = $this->db->prepare("SELECT AVG(puntaje) AS promedio FROM comentario WHERE id_evento=?");
        $sentencia->execute(array($id));
        $promedio = $sentencia->fetch(PDO::FETCH_OBJ);
        return $promedio;
        
    }
    
    public function InsertarComentario($id_usuario,$id_evento, $comentario,$puntaje){
        $sentencia = $this->db->prepare("INSERT INTO comentario(id_usuario, id_evento, comentario, puntaje) VALUES(?,?,?,?)");
        $sentencia->execute(array($id_usuario,$id_evento,$comentario,$puntaje));
        return $this->db->lastInsertId();
    }

    public function BorrarComentario($id){
        $sentencia = $this->db->prepare("DELETE FROM comentario WHERE id_comentario=?");
        $sentencia->execute(array($id));
    }
}
?>
