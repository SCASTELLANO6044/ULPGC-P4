<link rel="stylesheet" type="text/css" href="/style/user_activities_client.css">
<?php
$query = "
                        SELECT actividades.nombre as nombre, actividades.descripcion as descripcion, actividades.aforo as aforo
                        FROM actividades
                        JOIN usuarioactividad ON actividades.id = usuarioactividad.idactividad
                        WHERE usuarioactividad.idusuario = '".addslashes($user['id'])."' AND usuarioactividad.asistencia = 1
                    ";
$res = DB::execute_sql($query);
$res->setFetchMode(PDO::FETCH_ASSOC); // Establecemos que queremos cada fila como array asociativo
    
$datos = $res->fetchAll();
?>
        <div class = "finished-activities">
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
<?php
$query = "
    SELECT actividades.nombre as nombre, actividades.descripcion as descripcion, actividades.aforo as aforo
    actividad.id as actividadid, usuarioactividad.idusuario as usuarioid
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
                        <th>No quiero asistir a esta actividad</th>
                    </tr>
                </thead>
                <tbody>
<?php
            foreach($datos as $registro){
                echo "
                    <tr class=\"activity{$it}\">
                        <form method=\"post\" action=\"delete-pending-activity.php\">
                            <td>{$registro['nombre']}</td>
                            <td>{$registro['descripcion']}</td>
                            <td>{$registro['aforo']}</td>
                            <td>
                                    <button type=\"submit\" name=\"delete-pending-activity\" value=\"Borrar\">Borrar actividad</button>
                            </td>
                        </form>
                    </tr>   
                    ";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['delete-pending-activity'])) {
                    $query = "
                        DELETE *
                        FROM usuarioactividad where idusuario = 
                    ";
                }
            }
?>
                </tbody>
            </table>
        </div>
<?php
    $query = "
    SELECT nombre
    FROM actividades";
    $res = DB::execute_sql($query);
    $res->setFetchMode(PDO::FETCH_ASSOC); // Establecemos que queremos cada fila como array asociativo
        
    $datos = $res->fetchAll(); 
?>
        <div class="form form--add--activity" >
            <form autocomplete="off" method = "post">
                <h3>Registrarse en una actividad</h3>
                <select id="activity" name="activity">
                
<?php
            foreach($datos as $registro){
                echo "
                    <option value=\"{$registro['nombre']}\">{$registro['nombre']}</option>
                    ";
            }
?>
                </select>
                <button class="button"><input type="submit"> Iniciar sesión</button>
            </form>
        </div>
<?php
    if(isset($_POST)){
        echo '<table>';
        echo "<tr><th>Campo</th><th>Valor</th></tr>";
        foreach(array('nombre','apellidos','email','sexo','rol') as $field){
            if(isset($_POST[$field])){
                echo "<tr><td>$field</td><td>{$_POST[$field]}&nbsp;</td></tr>";
            }
        }
        echo '</table>';
    }
?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        