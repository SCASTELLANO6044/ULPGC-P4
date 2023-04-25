<?php
include_once '../../presentation.class.php';
include_once '../../data_access.class.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="/style/main.css">
        <link rel="stylesheet" type="text/css" href="/style/user_activities.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tus actividades</title>
    </head>
    <body>
<?php
    View::start();
    $user = User::getLoggedUser();
?>
    <div class="index-body">
        <div class="title">
            <h1>Tus actividades</h1>
        </div>
            
<?php
        if ($user == true) {
            switch ($user['rol']){
                case 3:
                    include_once 'client/user_activities_client.php';
                    break;
                case 2:
                    include_once 'trainer/user_activities_trainer.php';
                    break;
                case 1:
                    echo "<li><a href='/UserActivities.php'>Tus Actividades</a></li>";
                    echo "<li><a href='/logout.php'>Usuarios</a></li>";
                    break;
            }
        }
?>  
    </div>
<?php
    View::end();
?>