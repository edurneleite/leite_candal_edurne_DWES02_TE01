<?php

require 'coches.php';
require 'usuarios.php';
include 'request.php';

?>

<!------------------------------ RESERVA CONFIRMADA----------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Reserva de coches</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="cabecera">
        <h1>Reserva tu automovil</h1><br>
        <h2>Datos de tu reserva</h2>
        <p>Nombre de usuario: <b><?=$_SESSION['nombre']?></b></p>
        <p>Apellido de usuario: <b><?=$_SESSION['apellido']?></b></p>
        <p>Dni de usuario: <b><?=$_SESSION['dni']?></b></p>
        <p>Coche alquilado: <b><?=$_SESSION['modelo']?></b></p>
        <p>Fecha de la reserva: <b><?=$_SESSION['fecha']?></b></p>
        <p>Duracion de la reserva: <b><?=$_SESSION['dias']?> dias</b></p>
    </div>
    <div>
        <?php
            $imagenes = array( 
                "Lancia Stratos" => "../img/lancia.jpg", 
                "Audi Quattro" => "../img/audi.jpg", 
                "Ford Escort RS1800" => "../img/ford.jpg", 
                "Subaru Impreza 555" => "../img/subaru.jpg" 
            );
        ?>
        <img src="<?=$imagenes[$_SESSION['modelo']]?>" alt="coche">
    </div>
</body>
</html>