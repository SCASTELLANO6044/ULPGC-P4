<?php
include_once 'presentation.class.php';
include_once 'data_access.class.php';
User::logout();
View::start('Gimnasio WebFit');
echo "<h3>Ha dejado de estar identificado</h3>";
View::end();
