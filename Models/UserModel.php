<?php

class UserModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe2_db;charset=utf8', 'root', '');
    }

    public function GetUsuario($email){
        //acá irian unos try-catch
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE email = ?");
        $sentencia->execute(array($email));
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $usuario;
    }

    public function SwitchAdmin ($admin,$usuario){
        // FALTA PROBARLO
        $sentencia = $this->db->prepare("UPDATE usuario SET admin=? FROM usuario WHERE email=?");
        $sentencia->execute(array($admin,$usuario->email));
    }

    public function SetUser($usuario, $pass){
        $sentencia = $this->db->prepare("INSERT INTO usuario(email, password,admin) VALUES(?,?)");
        $sentencia->execute(array($usuario,$pass,0));
    }

    public function BorrarUsuario($email){
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE email=?");
        $sentencia->execute(array($email));
    }    
}

?>
