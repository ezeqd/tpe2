<?php

class EventosView {

    function __construct(){

    }

    public function DisplayCiudades($ciudades){
        $html = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <base href='.BASE_URL.' >

                <title>Ciudades</title>
            </head>
            <body>';


            foreach($ciudades as $ciudad) {
                $html.= "<li>". $ciudad->nombre . ": " . 
                                $ciudad->capacidad . ": ". 
                       "</li>";
            }


            $html.='<div><form action="insertar" method="post">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="fecha" placeholder="Fecha">
            <input type="text" name="organizador" placeholder="Organizador">
            <input type="text" name="ciudad" placeholder="Ciudad">
            <input type="submit" value="Insertar">
        </form></div>';
    
        $html.='</body>
        </html>';

        echo $html;
    }

    public function DisplayEventos($eventos){
        $html = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <base href='.BASE_URL.' >

                <title>Eventos</title>
            </head>
            <body>';


            foreach($eventos as $evento) {
                $html.= "<li>". $evento->nombre . ": " . 
                                $evento->fecha . ": ". 
                                $evento->organizador . ": " . 
                                $evento->id_ciudad  . ": " . 
                       "</li>";
            }


            $html.='<div><form action="insertar" method="post">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="fecha" placeholder="Fecha">
            <input type="text" name="organizador" placeholder="Organizador">
            <input type="text" name="ciudad" placeholder="Ciudad">
            <input type="submit" value="Insertar">
        </form></div>';
    
        $html.='</body>
        </html>';

        echo $html;
    }
}

?>
