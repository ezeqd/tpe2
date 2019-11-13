<?php

class UserModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe2_db;charset=utf8', 'root', '');
    }

    public function GetUsuario($usuario){
        //acá irian unos try-catch
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE email = ?");
        $sentencia->execute(array($usuario));
        
        $password = $sentencia->fetch(PDO::FETCH_OBJ);
        
        return $password;
    }

    public function SetUser($usuario, $pass){
        $sentencia = $this->db->prepare("INSERT INTO usuario(email, password) VALUES(?,?)");
        $sentencia->execute(array($usuario,$pass));
    }

    
}

?>
