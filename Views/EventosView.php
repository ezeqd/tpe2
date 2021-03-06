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
    
    public function DisplayEventos($eventos,$ciudades,$error = null){
        $this->smarty->assign('titulo',"Eventos");
        $this->smarty->assign('lista_ciudades',$ciudades);
        $this->smarty->assign('lista_eventos',$eventos);
        $this->smarty->assign('error',$error);
        $this->smarty->display('templates/ver_eventos.tpl');
    }

    public function DisplayEditarEvento($evento,$ciudades){
        $this->smarty->assign('titulo',"Editar Evento");
        $this->smarty->assign('lista_ciudades',$ciudades);
        $this->smarty->assign('evento',$evento);
        $this->smarty->display('templates/editar_evento.tpl');
    }

    public function DisplayDetallesEvento($evento,$imagenes,$usuario){
        $this->smarty->assign('titulo',"Detalle del Evento");
        $this->smarty->assign('evento',$evento);
        $this->smarty->assign('imagenes',$imagenes);
        $this->smarty->assign('usuario',$usuario);
        $this->smarty->display('templates/detalles_evento.tpl');
    }
}
?>
