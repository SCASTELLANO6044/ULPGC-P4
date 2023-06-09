<?php
include_once 'presentation.class.php';
include_once 'data_access.class.php';
?>
<link rel="stylesheet" type="text/css" href="css/login.css">
<?php
$mensaje = '';
if ( isset($_POST['cuenta']) ) {
    if ( User::login($_POST['cuenta'], $_POST['clave']) === true) {
        $mensaje = "Se ha identificado correctamente";
    } else {
        $mensaje = "La clave y/o usuario suministrado no coinciden";
    }
}
View::start('Gimnasio WebFit: login');
if ($mensaje != '') {
    echo "<h3 class=\"succesfull-login\">$mensaje</h3>";
} else {
?>
<form method="post">
    <label for="fcuenta">Cuenta</label>
    <input type="text" name="cuenta"><br>
    <label for="fclave">Clave</label>
    <input type="password" name="clave"><br>
<input type="submit">
</form>
<?php
}
View::end();
