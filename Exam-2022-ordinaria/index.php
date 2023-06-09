<?php
include_once 'presentation.class.php';
include_once 'data_access.class.php';
?>
<link rel="stylesheet" type="text/css" href="css/index.css">
<?php
View::start('Gimnasio WebFit');
$user = User::getLoggedUser();
if($user == null || $user['rol'] != 2){
 echo "<h2>Acceda como entrenador para ver listado de usuarios</h2>";   
}
View::end();
