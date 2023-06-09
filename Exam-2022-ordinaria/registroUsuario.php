<?php
include_once 'presentation.class.php';
include_once 'data_access.class.php';
?>
<link rel="stylesheet" type="text/css" href="css/registroUsuario.css">
<?php
View::start('Gimnasio WebFit');
$usuario = json_decode($_POST['usuario'], true);
$user = User::getLoggedUser();

if($user['rol'] == 2){
    $query = "SELECT * FROM registroestado WHERE idusuario = ? ORDER BY hora DESC";
    $param = $usuario['id'];
    $registroUsuario = DB::execute_sql($query, array($param));
    $registroUsuario->setFetchMode(PDO::FETCH_ASSOC); // Establecemos que queremos cada fila como array asociativo
    $datos = $registroUsuario->fetchAll(); 
    echo "<table class=\"estadoUsuario\">";
    echo "<tr>";
    echo "<th>Id del Usuario</th>";
    echo "<th>Hora</th>";
    echo "<th>Peso</th>";
    echo "<th>Grasa</th>";
    echo "<th>Pulsaciones</th>";
    echo "<th>Eliminar registro</th>";
    echo "</tr>";
    foreach ($datos as $fila){
        echo "<tr class = \"fila{$fila['id']}\">";
        echo "<td>{$fila['idusuario']}</td>";
        echo "<td>{$fila['hora']}</td>";
        echo "<td>{$fila['peso']}</td>";
        echo "<td>{$fila['grasa']}</td>";
        echo "<td>{$fila['pulsaciones']}</td>";
        echo "<td><button type=\"button\" onclick=\"deleteRegister({$fila['id']})\">Eliminar</button></td>";
    }
    echo '</table>';
    
    ?>
    <h3 class="AddRegister">Añade un nuevo registro</h3>
    <form method="post" onsubmit="addRegisterValidation(event, this)">
        <label for="fpeso">Peso</label>
        <input type="text" name="peso" id="peso"><br>
        <label for="fgrasa">Grasa</label>
        <input type="text" name="grasa" id="grasa"><br>
        <label for="fpulsaciones">Pulsaciones</label>
        <input type="text" name="pulsaciones" id="pulsaciones"><br>
    <input type="submit">
    </form>
    <?php
}
View::end();