<?php
require_once('materias.php');

if ($_GET['action'] == ''){
    $_GET['action'] = 'home';
}

$partesURL = explode('/', $_GET['action']);

switch ($partesURL[0]) {
    case 'materias':
        showMaterias();
        break;
    case 'nuevaMateria' :
        ShowFormulario();
        break;
    }
?>
