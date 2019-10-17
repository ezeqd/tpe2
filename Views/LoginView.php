<?php

require_once('libs/Smarty.class.php');

class LoginView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }
    
    public function DisplayLogin($data){
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->display('templates/login.tpl');
    }
}
?>