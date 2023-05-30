<?php
include_once 'presentation.class.php';
include_once 'business.class.php';
View::start('Artencuentro');
View::navigation(User::getLoggedUser());
$user = User::getLoggedUser();
?>

<link rel="stylesheet" type="text/css" href="css/listUser.css">

<?php
if ($user and $user['tipo'] = 1){
    View::listUsers(User::getAllUsers());   
}else{
    ?>
    <h3 class = "not-allowed">You are not an admin user.</h3>
    <?php   
}
View::end();
?>