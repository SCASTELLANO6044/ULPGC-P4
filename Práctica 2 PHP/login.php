<?php
include_once 'presentation.class.php';
include_once 'data_access.class.php';
$mensaje = '';
if ( isset($_POST['cuenta']) ) {
    if ( User::login($_POST['cuenta'], $_POST['clave']) === true) {
        $mensaje = "Se ha identificado correctamente";
    } else {
        $mensaje = "La clave y/o usuario suministrado no coinciden";
    }
}
View::start();
if ($mensaje != '') {
    echo "<h3>$mensaje</h3>";
} else {
?>
<form method="post">
Cuenta: <input type="text" name="cuenta"><br>
Clave: <input type="password" name="clave"><br>
<input type="submit">
</form>
<?php
}
View::end();
