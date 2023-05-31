<?php
include_once 'business.class.php';
class View{
    public static function  start($title){
        $html = "<!DOCTYPE html>
                    <html lang=\"es\">
                    <head>
                    <meta charset=\"utf-8\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                    <link rel=\"stylesheet\" type=\"text/css\" href=\"estilos.css\">
                    <script src=\"scripts.js\"></script>
                    <title>$title</title>
                    </head>
                    <body>";
        User::session_start();
        echo $html;
    }

    public static function imgtobase64($img){
        $b64 = base64_encode($img);
        $signature = substr($b64, 0, 3);
        if ( $signature == '/9j') {
            $mime = 'data:image/jpeg;base64,';
        } else if ( $signature == 'iVB') {
            $mime = 'data:image/png;base64,';
        }
        return $mime . $b64;
    }

    public static function navigation(){
        if (User::getLoggedUser()){
            echo '<div>';
                echo '<nav class = "nav-bar">';
                    echo '<a class = "index-link" href="/index.php">Inicio</a> ';
                    echo '<a class = "logout-link" href="/logout.php">Logout</a> ';
                    echo '<a class = "db-link" href="/a.php">Base de datos</a> ';
                echo '</nav>';
            echo '</div>';
        }else{
            echo '<div>';
                echo '<nav class = "nav-bar">';
                    echo '<a class = "index-link" href="/index.php">Inicio</a> ';
                    echo '<a class = "login-link" href="/login.php">Login</a> ';
                    echo '<a class = "db-link" href="/a.php">Base de datos</a> ';
                echo '</nav>';
            echo '</div>';
        }
        
    }

    public static function end(){
        $html = "
                    <footer>
                        <h4>GCActiva</h4>
                    </footer>
                </body>
            </html>
        ";
        echo $html;
    }
}


?>