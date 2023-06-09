<?php
include_once 'presentation.class.php';
include_once 'business.class.php';
User::logout();
View::start('Artencuentro');
View::navigation(User::getLoggedUser());
View::end();
?>