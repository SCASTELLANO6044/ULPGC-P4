<?php
include_once 'business.class.php';
class View{
    public static function  start(){
        User::session_start();
        self::navigation();
    }

    public static function navigation(){
        echo "
        
        <div class= \"nav-bar\" id=\"nav-var\">
            <nav>
                <ul>
        ";
        $user = User::getLoggedUser();
        echo "
        <li><a href='/index.php'>Inicio</a></li>
        <li><a href=\"/php/contact.php\">Contacto</a></li>
        <li><a href=\"/php/gym-activities/gym_activities.php\">Actividades</a></li>
        ";
        if ( $user == true) {
            switch ($user['rol']){
                case 2:
                case 3:
                    echo "<li><a href='/php/user-activities/user_activities.php'>Tus Actividades</a></li>";
                    break;
                case 1:
                    echo "<li><a href='/php/user-activities/user_activities.php'>Tus Actividades</a></li>";
                    echo "<li><a href='/logout.php'>Usuarios</a></li>";
                    break;
            }
            echo "<li><a href='/logout.php'>Cerrar sesión</a></li>";
        } else {
            echo " <li><a href='/php/signup.php'>Iniciar sesión</a></li>";
        }
        echo " 
                    <li><a href='/a.php'>Base de Datos</a></li>
                </ul>
            </nav> 
        </div>
        ";
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
        echo 
                    '</body>
                </html>';
    }
}
