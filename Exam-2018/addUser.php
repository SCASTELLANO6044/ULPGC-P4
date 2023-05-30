<?php
include_once 'presentation.class.php';
View::start('Artencuentro');
View::navigation(User::getLoggedUser());
$user = User::getLoggedUser();

if (isset($_POST['cuenta'])) {
    $users = User::getAllUsers();
    $founded = FALSE;
    echo $founded;
    foreach($users as $user) {
        if ($user['cuenta'] == $_POST['cuenta']){
               $founded = TRUE;
        }
    }
    if($founded == FALSE){
        echo 'hola';
        $query = "INSERT INTO usuarios (cuenta, clave, nombre, tipo, poblacion, direccion, telefono) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params = array($_POST['cuenta'], $_POST['clave'], $_POST['nombre'], $_POST['tipo'], $_POST['poblacion'], $_POST['direccion'], $_POST['telefono']);
        DB::execute_sql($query, $params);
    }
}

?>
<link rel="stylesheet" type="text/css" href="css/addUser.css">
<script src="js/addUser.js"></script>
<?php

if ($user and $user['tipo'] = 1){
    echo '<form method="post" onsubmit="addUserValidation(event, this)">';
    echo '<label for="cuenta">Cuenta </label>';
    echo '<input type="text" name="cuenta" id="cuenta">';
    
    echo '<label for="clave">Clave </label>';
    echo '<input type="password" name="clave" id="clave">';
    
    echo '<label for="nombre">Nombre </label>';
    echo '<input type="text" name="nombre" id="nombre">';
    
    echo '<label for="tipo">Tipo</label>';
    echo '<select id = "tipo" name="tipo">
            <option value="1">1: Administrador</option>
            <option value="2">2: Autor</option>
            <option value="3">3: Empresa</option>
        </select>';
    
    echo '<label for="poblacion">Población </label>';
    echo '<input type="text" name="poblacion" id="poblacion">';
    
    echo '<label for="direccion">Dirección </label>';
    echo '<input type="text" name="direccion" id="direccion">';
    
    echo '<label for="telefono">Teléfono </label>';
    echo '<input type="text" name="telefono" id="telefono">';
    
    echo '<input type="submit" value="Enviar">';
    echo "</form>";
    
}else{

    ?>
    <h3 class = "not-allowed">You are not an admin user.</h3>
    <?php   

}
View::end();
?>

<!--<!doctype html>-->
<!--<html>-->
<!--    <head>-->
<!--        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<!--        <title>Falta desarrollar</title>-->
<!--    </head>-->
<!--    <body>-->
<!--        <h1>Falta desarrollar</h1>-->
<!--    </body>-->
<!--</html>-->