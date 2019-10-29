<?php

require_once('libs/Smarty.class.php');

class EventosView {

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
    
    public function DisplayEventos($eventos,$ciudades){
        $this->smarty->assign('titulo',"Mostrar Eventos");
        $this->smarty->assign('lista_ciudades',$ciudades);
        $this->smarty->assign('lista_eventos',$eventos);
        $this->smarty->display('templates/ver_eventos.tpl');
    }

    public function DisplayEditarEvento($evento,$ciudades){
        $this->smarty->assign('titulo',"Editar Evento");
        $this->smarty->assign('lista_ciudades',$ciudades);
        $this->smarty->assign('evento',$evento);
        $this->smarty->display('templates/editar_evento.tpl');
    }

    public function DisplayDetallesEvento($evento,$ciudades){
        $this->smarty->assign('titulo',"Detalles Evento");
        $this->smarty->assign('evento',$evento);
        $this->smarty->display('templates/detalles_evento.tpl');
    }
}
?>
