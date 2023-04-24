<?php
include_once 'presentation.class.php';
include_once 'data_access.class.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="style/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tus actividades</title>
    </head>
    <body>
<?php
    View::start();
    $user = User::getLoggedUser();
    $query = "
        SELECT actividades.nombre as nombre, actividades.descripcion as descripcion, actividades.aforo as aforo
        FROM actividades
        JOIN usuarioactividad ON actividades.id = usuarioactividad.idactividad
        WHERE usuarioactividad.idusuario = '".addslashes($user['id'])."'";
    $res = DB::execute_sql($query);
    $res->setFetchMode(PDO::FETCH_ASSOC); // Establecemos que queremos cada fila como array asociativo
    
    $datos = $res->fetchAll();
?>
    <div class="index-body">
        <div class="title">
            <h1>Tus actividades</h1>
        </div>
        <div>
            
<?php
        if ($user == true) {
            switch ($user['rol']){
        ##############################################INICIO ROL DE ENTRENADOR################################################
                case 2:
                    $query = "
                        SELECT actividades.nombre as nombre, actividades.descripcion as descripcion, actividades.aforo as aforo
                        FROM actividades
                        JOIN usuarioactividad ON actividades.id = usuarioactividad.idactividad
                        WHERE usuarioactividad.idusuario = '".addslashes($user['id'])."' AND usuarioactividad.asistencia = 0
                    ";
?>
        <h3> Actividades pendientes </h3>
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
                    foreach($datos as $registro){
                        $it = 1;
                        echo "
                            <tr class=\"activity{$it}\">
                                <td><a href=\"./Activities/{$registro['nombre']}.html\">{$registro['nombre']}</a></td>
                                <td>{$registro['descripcion']}</td>
                                <td>{$registro['aforo']}</td>
                            </tr>   
                            ";
                        $it++;
                    }
?>
            </tbody>
        </table>
<?php
                    break;
        ##############################################FIN ROL DE ENTRENADOR################################################
        
        
        ##############################################INICIO ROL DE CLIENTE################################################
                case 3:
                    $query = "
                        SELECT actividades.nombre as nombre, actividades.descripcion as descripcion, actividades.aforo as aforo
                        FROM actividades
                        JOIN usuarioactividad ON actividades.id = usuarioactividad.idactividad
                        WHERE usuarioactividad.idusuario = '".addslashes($user['id'])."' AND usuarioactividad.asistencia = 1
                    ";
?>
        <h3> Actividades realizadas </h3>
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
                    foreach($datos as $registro){
                        $it = 1;
                        echo "
                            <tr class=\"activity{$it}\">
                                <td><a href=\"./Activities/{$registro['nombre']}.html\">{$registro['nombre']}</a></td>
                                <td>{$registro['descripcion']}</td>
                                <td>{$registro['aforo']}</td>
                            </tr>   
                            ";
                        $it++;
                    }
?>
            </tbody>
        </table>
<?php
                    $query = "
                        SELECT actividades.nombre as nombre, actividades.descripcion as descripcion, actividades.aforo as aforo
                        FROM actividades
                        JOIN usuarioactividad ON actividades.id = usuarioactividad.idactividad
                        WHERE usuarioactividad.idusuario = '".addslashes($user['id'])."' AND usuarioactividad.asistencia = 0
                    ";
?>
        <h3> Actividades pendientes </h3>
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
                    foreach($datos as $registro){
                        $it = 1;
                        echo "
                            <tr class=\"activity{$it}\">
                                <td><a href=\"./Activities/{$registro['nombre']}.html\">{$registro['nombre']}</a></td>
                                <td>{$registro['descripcion']}</td>
                                <td>{$registro['aforo']}</td>
                            </tr>   
                            ";
                        $it++;
                    }
?>
            </tbody>
        </table>
<?php
                    break;
                    
        ##############################################FIN ROL DE CLIENTE################################################
                case 1:
                    echo "<li><a href='/UserActivities.php'>Tus Actividades</a></li>";
                    echo "<li><a href='/logout.php'>Usuarios</a></li>";
                    break;
            }
            echo "<li><a href='/logout.php'>Cerrar sesión</a></li>";
        }
?>
            
            <h3> Actividades pendientes </h3>
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
    foreach($datos as $registro){
        $it = 1;
        echo "
                    <tr class=\"activity{$it}\">
                        <td><a href=\"./Activities/{$registro['nombre']}.html\">{$registro['nombre']}</a></td>
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