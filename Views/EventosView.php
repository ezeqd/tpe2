<?php

require('libs/Smarty.class.php');

class EventosView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }
    
    public function DisplayEventos($eventos){
        
        $this->smarty->assign('titulo',"Mostrar Eventos");
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('lista_eventos',$eventos);
        $this->smarty->display('templates/ver_eventos.tpl');
    }
    
    public function DisplayCiudades($ciudades){
        
        $this->smarty->assign('titulo',"Mostrar Ciudades");
        $this->smarty->assign('BASE_URL',BASE_URL);
        $this->smarty->assign('lista_ciudades',$ciudades);
        $this->smarty->display('templates/ver_ciudades.tpl');
    }
}
?>
