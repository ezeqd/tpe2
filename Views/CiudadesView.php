<?php

require_once('libs/Smarty.class.php');

class CiudadesView {

    private $smarty;
    private $authHelper;
    private $userName;
	
	function __construct(){
		$this->smarty = new Smarty();
		$this->authHelper = new AuthHelper();
        $this->userName = $this->authHelper->getLoggedUserName();
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('userName', $this->userName);
	}

	public function DisplayCiudades($ciudades){
		$this->smarty->assign('titulo',"Ciudades");
        $this->smarty->assign('lista_ciudades',$ciudades);
        $this->smarty->display('templates/ver_ciudades.tpl');
	}

	public function DisplayEditarCiudad($ciudad){
        $this->smarty->assign('titulo',"Editar Ciudad");
        $this->smarty->assign('ciudad',$ciudad);
        $this->smarty->display('templates/editar_ciudad.tpl');
    }
}
?>
