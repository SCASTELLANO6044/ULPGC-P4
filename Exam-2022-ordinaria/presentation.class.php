<?php
include_once 'business.class.php';
class View{
    public static function  start($title){
        $html = "<!DOCTYPE html>
<html>
<head>
<meta charset=\"utf-8\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"/estilos.css\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"/jquery-ui.min.css\">

<script src=\"/jquery.min.js\"></script>
<script src=\"/jquery-ui.min.js\"></script>

<script src=\"/scripts.js\"></script>
<title>$title</title>
</head>
<body>";
        User::session_start();
        echo $html;
        self::navigation();
        echo "<div class=\"gym-logo\">";
        echo    "<img src='/logo.png' alt='logo de WebSalud'>";
        echo    "<h1>$title</h1>";
        echo "</div>";
    }

    public static function navigation(){
        echo "<nav class=\"nav-bar\">";
        $user = User::getLoggedUser();
        echo "<a href='/index.php'>inicio</a>";
        if ( $user !== false) {
            if ($user['rol'] == 2) {
                echo " <a href='/usuariosregistroestado.php'>Lista estado usuario</a>";
            }
            echo " <a href='/logout.php'>logout</a>";
        } else {
            echo " <a href='/login.php'>login</a>";
        }
        echo " <a href='/a.php'>Base de Datos</a>";
        echo "</nav>";
    }

    public static function imgbase64($b64){
        // $b64 es el contenido de un fichero jpj o png en base64
        $signature = substr($b64, 0, 3);
        if ( $signature == '/9j') {
            $mime = 'data:image/jpeg;base64,';
        } else if ( $signature == 'iVB') {
            $mime = 'data:image/png;base64,';
        }
        return $mime . $b64;
    }

    public static function end(){
        echo '</body>
</html>';
    }
}
