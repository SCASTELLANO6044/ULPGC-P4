<?php
include_once 'presentation.class.php';
include_once 'data_access.class.php';
View::start('GCActiva');
View::navigation();
User::logout();
echo "<h3>Ha dejado de estar identificado</h3>";
View::end();
