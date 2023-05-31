<?php
include_once 'presentation.class.php';
include_once 'data_access.class.php';
View::start('GCActiva');
View::navigation();
?>
<link rel="stylesheet" type="text/css" href="css/index.css">
<div class = 'home-image'>
    <img src='logo.png'>    
</div>

<?php
$res = DB::execute_sql('SELECT * FROM actividades;');
$res->setFetchMode(PDO::FETCH_NAMED); // Establecemos que queremos cada fila como array asociativo

$datos = $res->fetchAll(); // Leo todos los datos de una vez

echo '<h2>Ejemplo acceso a tabla</h2>';
// Ejemplo de mostrado de datos en forma de tabla HTML
echo "<table>";
echo "<tr>";
echo "<th>Nombre</th>";
echo "<th>Precio</th>";
echo "<th>Imagen</th>";
echo "</tr>";

foreach($datos as $registro){
    echo "<tr>";
    echo "<td>{$registro['nombre']}</td>";
    echo "<td>{$registro['precio']}</td>";
    $imgb64 = View::imgtobase64($registro['imagen']);
    echo "<td><img src='$imgb64'></td>";
    echo "</tr>";
}
echo '</table>';

View::end();