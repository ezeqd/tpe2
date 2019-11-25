<?php

require_once('libs/Smarty.class.php');

class UserView {

    private $smarty;
    private $authHelper;
    private $userName;

    function __construct(){
        $this->smarty = new Smarty();
        $this->authHelper = new AuthHelper();
        $this->userName = $this->authHelper->getLoggedUserName();
        $this->smarty->assign('userName', $this->userName);
        $this->smarty->assign('BASE_URL',BASE_URL);
    }
    
    public function DisplayLogin($error = null){
        $this->smarty->assign('titulo',"Iniciar Sesión");
        $this->smarty->assign('error',$error);
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->display('templates/login.tpl');
    }

    public function DisplayRegister($error = null){
        $this->smarty->assign('titulo','Registrate');
        $this->smarty->assign('error',$error);
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->display('templates/register.tpl');
    }

    public function DisplayRecovery($error = null){
        $this->smarty->assign('titulo','Recuperar Contraseña');
        $this->smarty->assign('error',$error);
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->display('templates/users/recovery.tpl');
    }
    
    public function DisplayUsuarios($usuarios, $usuario, $error = null){
        $this->smarty->assign('titulo','Usuarios');
        $this->smarty->assign('error',$error);
        $this->smarty->assign('lista_usuarios',$usuarios);
        $this->smarty->assign('user',$usuario);
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->display('templates/ver_usuarios.tpl');    
    }
}
?>