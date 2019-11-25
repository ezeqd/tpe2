<?php

class UserModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe2_db;charset=utf8', 'root', '');
    }

    public function GetUsuarios(){
        $sentencia = $this->db->prepare("SELECT * FROM usuario");
        $sentencia->execute(array());
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }

    public function GetUsuario($email){
        //acá irian unos try-catch
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE email = ?");
        $sentencia->execute(array($email));
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

    public function GetUsuarioById ($id){
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
        $sentencia->execute(array($id));
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

    public function SwitchAdmin($admin,$usuario){
        // FALTA PROBARLO
        $sentencia = $this->db->prepare("UPDATE usuario SET admin=? WHERE id_usuario=?");
        $sentencia->execute(array($admin,$usuario->id_usuario));
    }

    public function SetUser($usuario, $pass){
        $sentencia = $this->db->prepare("INSERT INTO usuario(email, password,admin) VALUES(?,?,?)");
        $sentencia->execute(array($usuario,$pass,0));
    }

    public function UpdatePass($id, $pass){
        $sentencia = $this->db->prepare("UPDATE usuario SET password=? WHERE id_usuario=?");
        $sentencia->execute(array($pass,$id));
    }

    public function BorrarUsuario($id){
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id_usuario=?");
        $sentencia->execute(array($id));
        // var_dump($sentencia->errorInfo()); die();

    }    
}

?>
