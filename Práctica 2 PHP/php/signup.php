<?php
include_once '../presentation.class.php';
include_once '../data_access.class.php';

$mensaje = '';
if ( isset($_POST['cuenta']) ) {
    if ( User::login($_POST['cuenta'], $_POST['clave']) === true) {
        $mensaje = "Se ha identificado correctamente";
    } else {
        $mensaje = "La clave y/o usuario suministrado no coinciden";
    }
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="/style/main.css">
        <link rel="stylesheet" type="text/css" href="/style/signup.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <title>Document</title>
    </head>
    <body>
<?php
    View::start();
?>
    <div class="index-body">
        <div class="title">
            <h2>Registro</h2>
        </div>
        
<?php
    if ($mensaje != '') {
        echo "<h3>$mensaje</h3>";
    } else {
        ?>
            <div class="form form--login" >
                <form autocomplete="off" method = "post">
                    <input type="text" name="cuenta" required placeholder="cuenta">
                    <input type="password" name="clave" required placeholder="contraseña">
                    <button class="button"><input type="submit"> Iniciar sesión</button>
                </form>
            </div>
    <?php
    }
    ?>
    </div>
<?php
    View::end();
?>

