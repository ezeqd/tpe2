<?php
    if((isset($_POST)) && isset($_POST['nombre']) && isset($_POST['Email'])){
        echo "<p>Su nombre es: ". $_POST['nombre']. "</p>";
    }
?>