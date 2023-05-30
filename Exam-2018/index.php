<?php
include_once 'presentation.class.php';
View::start('Artencuentro');
View::navigation(User::getLoggedUser());
View::end();