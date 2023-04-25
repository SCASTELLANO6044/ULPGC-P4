<?php
include_once 'presentation.class.php';
include_once 'data_access.class.php';
User::logout();

?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="./style/main.css">
        <link rel="stylesheet" type="text/css" href="/style/logout.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log out</title>
    </head>
    <body>
<?php

View::start();

?>

<div class="index-body">
        <div class="title">
            <h3>Ha dejado de estar identificado</h3>
        </div>
</div>

<?php
View::end();
?>