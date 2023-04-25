<?php
include_once '../../presentation.class.php';
include_once '../../data_access.class.php';
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="/style/main.css">
        <link rel="stylesheet" type="text/css" href="/style/gym-activities.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    
<?php

    View::start();
    $query = '
        SELECT nombre, descripcion, aforo FROM actividades;
    ';
    $res = DB::execute_sql($query);
    $res->setFetchMode(PDO::FETCH_ASSOC); // Establecemos que queremos cada fila como array asociativo
    
    $datos = $res->fetchAll();

?>
    <div class="index-body">
        <h1>Actividades</h1>
        <div>
            <table class="activities">
                <thead>
                    <tr class="heading">
                        <th>Actividad</th>
                        <th>Descripción</th>
                        <th>Aforo</th>
                    </tr>
                </thead>
                <tbody>
                    
<?php
    $it = 1;
    foreach($datos as $registro){
        echo "
                <tr class=\"activity{$it}\">
                    <td>{$registro['nombre']}</td>
                    <td>{$registro['descripcion']}</td>
                    <td>{$registro['aforo']}</td>
                </tr>   
            ";
        $it++;
    }
?>
                </tbody>
            </table>
        </div>
    </div>
<?php
    View::end();
?>