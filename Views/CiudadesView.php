<?php

require_once('libs/Smarty.class.php');

class CiudadesView {
	
	function __construct(){
		$this->smarty = new Smarty();
	}

	public function DisplayCiudades($ciudades){
		$this->smarty->assign('titulo',"Mostrar Ciudades");
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('lista_ciudades',$ciudades);
        $this->smarty->display('templates/ver_ciudades.tpl');
	}
}
?>
