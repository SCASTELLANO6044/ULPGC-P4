<?php
include_once 'presentation.class.php';
include_once 'data_access.class.php';
?>
<link rel="stylesheet" type="text/css" href="css/logout.css">
<?php
User::logout();
View::start('Gimnasio WebFit');
echo "<h3 class=\"succesfull-logout\">Ha dejado de estar identificado</h3>";
View::end();
