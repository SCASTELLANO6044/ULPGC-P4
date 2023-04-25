<?php
include_once 'presentation.class.php';
include_once 'data_access.class.php';
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="./style/main.css">
        <link rel="stylesheet" type="text/css" href="./style/index.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/index.js"></script>
        <title>Home</title>
    </head>
    <body>
<?php
View::start();

$query = '
    SELECT horainicio, actividades.nombre as anombre,
           espacios.nombre as enombre FROM actividades
      JOIN espacios
        ON actividades.idespacio = espacios.id;
';
$res = DB::execute_sql($query);
$res->setFetchMode(PDO::FETCH_ASSOC); // Establecemos que queremos cada fila como array asociativo

$datos = $res->fetchAll(); // Leo todos los datos de una vez

?>
    <div class="index-body">
        <div class="title">
            <h1>WebFit</h1>
        </div>
        <div class="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/gym0.png" alt="Imagen 1">
              </div>
              <div class="carousel-item">
                <img src="img/gym1.png" alt="Imagen 2">
              </div>
            </div>
            <div class="carousel-text">
                <h4>Tu nuevo gimnasio del campus universitario <br></h4>
                <p>Ven a entrenar con nosotros y progresa como siempre has querido en el camino de la fuerza.</p>
            </div>
        </div>
        <div class="description">
            <h3>Sobre nosotros</h3>
            <div>
                <img src="img/gym0.png" alt="Imagen 1">
            </div>
            <p>Bienvenidos a WebFit, el gimnasio diseñado especialmente para personas de avanzada edad. 
                Aquí en WebFit, nuestra principal preocupación es ayudar a nuestros clientes a mantener un 
                estilo de vida saludable y activo, independientemente de su edad.
                
                Nuestra amplia variedad de equipos de entrenamiento y programas de ejercicios están diseñados 
                específicamente para las necesidades y limitaciones de nuestros clientes mayores. Además, 
                nuestro equipo de entrenadores altamente capacitados y experimentados está disponible para 
                brindar apoyo personalizado en todo momento.

                En WebFit, nos enorgullece ser más que un simple gimnasio. Somos una comunidad de personas 
                comprometidas con el bienestar físico y mental de nuestros miembros. Además de nuestro programa 
                de entrenamiento personalizado, ofrecemos actividades grupales, clases de yoga y meditación, así 
                como charlas informativas sobre nutrición y salud en general.

                Bienvenidos a WebFit, el gimnasio diseñado especialmente para personas de avanzada edad. 
                Aquí en WebFit, nuestra principal preocupación es ayudar a nuestros clientes a mantener un 
                estilo de vida saludable y activo, independientemente de su edad.
                
                Nuestra amplia variedad de equipos de entrenamiento y programas de ejercicios están diseñados 
                específicamente para las necesidades y limitaciones de nuestros clientes mayores. Además, 
                nuestro equipo de entrenadores altamente capacitados y experimentados está disponible para 
                brindar apoyo personalizado en todo momento.

                En WebFit, nos enorgullece ser más que un simple gimnasio. Somos una comunidad de personas 
                comprometidas con el bienestar físico y mental de nuestros miembros. Además de nuestro programa 
                de entrenamiento personalizado, ofrecemos actividades grupales, clases de yoga y meditación, así 
                como charlas informativas sobre nutrición y salud en general.

                Bienvenidos a WebFit, el gimnasio diseñado especialmente para personas de avanzada edad. 
                Aquí en WebFit, nuestra principal preocupación es ayudar a nuestros clientes a mantener un 
                estilo de vida saludable y activo, independientemente de su edad.
                
                Nuestra amplia variedad de equipos de entrenamiento y programas de ejercicios están diseñados 
                específicamente para las necesidades y limitaciones de nuestros clientes mayores. Además, 
                nuestro equipo de entrenadores altamente capacitados y experimentados está disponible para 
                brindar apoyo personalizado en todo momento.

                En WebFit, nos enorgullece ser más que un simple gimnasio. Somos una comunidad de personas 
                comprometidas con el bienestar físico y mental de nuestros miembros. Además de nuestro programa 
                de entrenamiento personalizado, ofrecemos actividades grupales, clases de yoga y meditación, así 
                como charlas informativas sobre nutrición y salud en general.

                Bienvenidos a WebFit, el gimnasio diseñado especialmente para personas de avanzada edad. 
                Aquí en WebFit, nuestra principal preocupación es ayudar a nuestros clientes a mantener un 
                estilo de vida saludable y activo, independientemente de su edad.
                
                Nuestra amplia variedad de equipos de entrenamiento y programas de ejercicios están diseñados 
                específicamente para las necesidades y limitaciones de nuestros clientes mayores. Además, 
                nuestro equipo de entrenadores altamente capacitados y experimentados está disponible para 
                brindar apoyo personalizado en todo momento.

                En WebFit, nos enorgullece ser más que un simple gimnasio. Somos una comunidad de personas 
                comprometidas con el bienestar físico y mental de nuestros miembros. Además de nuestro programa 
                de entrenamiento personalizado, ofrecemos actividades grupales, clases de yoga y meditación, así 
                como charlas informativas sobre nutrición y salud en general.
                ¡Únete a la familia WebFit hoy mismo y comienza a sentirte más saludable, más fuerte y más feliz!
            </p>
        </div>         
        <div class="tables">
            <div class="price">
                <table class="subscriptions">
                    <thead>
                        <tr class="heading">
                            <th>Tarifa</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="month">
                            <td>Mensual</td>
                            <td>30 €</td>
                        </tr>
                        <tr class="trimestral">
                            <td>Trimestral</td>
                            <td>80 €</td>
                        </tr>
                        <tr class="semestral">
                            <td>Semestral</td>
                            <td>140 €</td>
                        </tr>
                    </tbody>
                </table>  
            </div>
            <div class="schedule">
                <table class="time-table">
                    <thead>
                        <tr class="heading">
                            <th>Día</th>
                            <th>Horario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="monday-saturday">
                            <td>Lunes - Sábado</td>
                            <td>08:00 - 23:00</td>
                        </tr>
                        <tr class="sunday">
                            <td>Domingo</td>
                            <td>08:00 - 14:00</td>
                        </tr>
                    </tbody>
                </table>  
            </div>
        </div>
        <div class="contact">
            <p>
                Para más información contacta con nosotros <a href="./contact.html">aquí.</a>
            </p>
        </div>
    </div>
<?php
    View::end();
?>