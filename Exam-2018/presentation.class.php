<?php
include_once 'business.class.php';
class View{
    public static function  start($title){
        $html = "<!DOCTYPE html>
<html>
<head>
<meta charset=\"utf-8\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"estilos.css\">
<script src=\"jquery.js\"></script>
<script src=\"scripts.js\"></script>
<title>$title</title>
</head>
<body>";
        User::session_start();
        echo $html;
    }
    public static function navigation($user = false){
        if ($user) {
            echo '<nav class = "nav-bar"><ul>';
            echo '<li><a href="logout.php">Log out</logout></li>';
            echo '<li><a href="addUser.php">Añade usuario</a></li>';
            echo '<li><a href="listUsers.php">Lista usuarios</a></li>';
            echo '</ul></nav>';
        }else{
            echo '<nav class = "nav-bar"><ul>';
            echo '<li><a href="login.php">Login</login></li>';
            echo '<li><a href="addUser.php">Añade usuario</a></li>';
            echo '<li><a href="listUsers.php">Lista usuarios</a></li>';
            echo '</ul></nav>';
        }
    }
    public static function listUsers($users){
        if (count($users) > 0) {
            echo '<table>';
            echo '<tr>';
            echo '<th>Cuenta</th>';
            echo '<th>Nombre</th>';
            echo '<th>Tipo</th>';
            echo '<th>Población</th>';
            echo '<th>Dirección</th>';
            echo '<th>Teléfono</th>';
            echo '<th>Borrar</th>';
            echo '</tr>';
            foreach($users as $user) {
                echo '<tr>';
                echo "<td id={$user['cuenta']}>{$user['cuenta']}</td>";
                echo "<td>{$user['nombre']}</td>";
                $tipostr = (['Administrador', 'Autor', 'Empresa'])[$user['tipo']-1];
                echo "<td>$tipostr</td>";
                echo "<td>{$user['poblacion']}</td>";
                echo "<td>{$user['direccion']}</td>";
                echo "<td>{$user['telefono']}</td>";
                echo "<td><button onclick=\"deleteUser('{$user['cuenta']}')\">Borrar</button></td>";
                echo '</tr>';
            }
            echo "</table>";
        }
    }
    public static function loginForm(){
            echo '<form method="post">';
            echo '<label for="cuenta">Cuenta </label>';
            echo '<input type="text" name="cuenta" id="cuenta">';
            echo '<label for="clave">Clave </label>';
            echo '<input type="password" name="clave" id="clave">';
            echo '<input type="submit" value="Enviar">';
            echo "</form>";
    }

    public static function end(){
        echo '</body>
</html>';
    }
}

?>