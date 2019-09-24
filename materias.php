<?php


function conectar(){
    $db = new PDO('mysql:host=localhost;'.'dbname=db_web2;charset=utf8', 'root', '');
    return $db;
}

function getMaterias (){
    // ABRO CONEXION
    $db_connection = conectar();
    //PREPARO LA CONSULTA
    $query = $db_connection->prepare('SELECT * FROM materia');
    // EJECUTO LA CONSULTA
    $query->execute();
    // OBTENER LA RESPUESTA
    $materias = $query->fetchall(PDO::FETCH_OBJ); 

    return $materias;
}


function showMaterias(){
    $materias = getMaterias();
    var_dump($materias);
    $html = '<ul>';
    foreach($materias as $materia){
        $html.= "<li>{$materia->nombre} : {$materia->docente}</li>";
    }
    $html.= '</ul>';
    echo $html;
    
}

function showFormulario(){
    $html2 =    '
                <h2>Agregar materias:</h2>
                <form method="POST" action="materias">
                <div>
                <input placeholder="materia" type="text" name="materia"  />
                </div>
                <div>
                <input placeholder="docente" type="text" name="docente" />
                </div>
                <div>
                <input type="submit"/>
                </div>
                </form>
                ';
    echo $html2;
}

function addMateria(){
    var_dump($_POST);
    if (isset ($_POST['materia'])&&($_POST['docente'])){
        $materia = $_POST['materia'];
        $docente = $_POST['docente'];
        insertMateria($materia, $docente);
        header("Location: materias");
    }
}

function insertMateria($materia, $docente){
    // ABRO CONEXION
    $db_connection = conectar();
    //PREPARO LA CONSULTA
    $query = $db_connection->prepare('INSERT INTO materia (nombre,docente) VALUES (?,?)');
    // EJECUTO LA CONSULTA
    $ok = $query->execute(array($materia,$docente));   
    if(!$ok) print_r($query->errorInfo());
}
addMateria();