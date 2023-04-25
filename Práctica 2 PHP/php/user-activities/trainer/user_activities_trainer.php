<link rel="stylesheet" type="text/css" href="/style/user_activities_trainer.css">
<?php

$user = User::getLoggedUser();
$query = "
                        SELECT actividades.nombre as nombre, actividades.descripcion as descripcion, actividades.aforo as aforo
                        FROM actividades
                        JOIN usuarioactividad ON actividades.id = usuarioactividad.idactividad
                        WHERE usuarioactividad.idusuario = '".addslashes($user['id'])."' AND usuarioactividad.asistencia = 0
                    ";
$res = DB::execute_sql($query);
$res->setFetchMode(PDO::FETCH_ASSOC); // Establecemos que queremos cada fila como array asociativo
    
$datos = $res->fetchAll();

?>
        <div class = "pending-activities">
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