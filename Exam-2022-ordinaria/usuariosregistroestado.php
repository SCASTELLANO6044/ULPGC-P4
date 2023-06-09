<?php
include_once 'presentation.class.php';
include_once 'data_access.class.php';
View::start('Lista registro estado usuarios');
?>
<link rel="stylesheet" type="text/css" href="css/usuariosregistroestado.css">
<?php
$query = '
    SELECT * FROM usuarios
      WHERE rol = 3;
';
$res = DB::execute_sql($query);
$res->setFetchMode(PDO::FETCH_ASSOC); // Establecemos que queremos cada fila como array asociativo

$datos = $res->fetchAll(); // Leo todos los datos de una vez

echo '<h2>Lista usuarios</h2>';
// Ejemplo de mostrado de datos en forma de tabla HTML
echo "<table class=\"registroEstado\">";
echo "<tr>";
echo "<th>Cuenta</th>";
echo "<th>Nombre</th>";
echo "<th>Email</th>";
echo "<th>Registros</th>";
echo "</tr>";
# print_r($datos);
foreach($datos as $usuarios){
    echo "<tr>";
    echo "<td>{$usuarios['cuenta']}</td>";
    echo "<td>{$usuarios['nombre']}</td>";
    echo "<td>{$usuarios['email']}</td>";
    echo "<td>";
    echo    "<form action=\"registroUsuario.php\" method=\"post\">";
    echo    "<input type=\"hidden\" name=\"usuario\", value=\"".htmlspecialchars(json_encode($usuarios)). "\">";
    echo    "<input type=\"submit\", value=\"Ver y Editar\">";
    echo    "</form>";
    echo "</td>";
    echo "</tr>";
}
echo '</table>';

View::end();