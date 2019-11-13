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

    public function SwitchAdmin ($email){
        // FALTA PROBARLO
        $usuario = $this->GetUsuario($email);
        $sentencia = $this->db->prepare("UPDATE usuario SET admin=? FROM usuario WHERE email=?");
        if ($usuario->admin){
            $sentencia->execute(array(0,$usuario));
        }
        else{
            $sentencia->execute(array(1,$usuario));
        }
    }

    public function SetUser($usuario, $pass){
        $sentencia = $this->db->prepare("INSERT INTO usuario(email, password,admin) VALUES(?,?)");
        $sentencia->execute(array($usuario,$pass,0));
    }

    
}

?>
