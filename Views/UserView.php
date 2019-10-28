<?php

require_once('libs/Smarty.class.php');

class UserView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
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
}
?>