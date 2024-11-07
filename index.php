<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Reserva de coches</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="cabecera">
        <h1>Reserva tu automovil</h1><br>
        <p>Seleccione los datos de tu reserva</p></br>
    </div>
    
    <div class="container">
        <form action="php/request.php" method="post">
            <label for="nombre">Nombre:</label><br>
            <input type="text" name="nombre"><br>
            <label for="apellido">Apellido:</label><br>
            <input type="text" name="apellido"><br>
            <label for="dni">DNI:</label><br>
            <input type="text" name="dni"><br>
            <label for="modelo">Elige el modelo del vehiculo</label><br>
            <select id="modelo" name="modelo"> 
                <option value="Lancia Stratos">Lancia Stratos</option> 
                <option value="Audi Quattro">Audi Quattro</option> 
                <option value="Ford Escort RS1800">Ford Escort RS1800</option>
                <option value="Subaru Impreza 555">Subaru Impreza 555</option> 
            </select><br>
            <label for="fecha">Fecha reserva:</label><br>
            <input type="date" name="fecha"><br>
            <label for="dias">Dias reserva:</label><br>
            <input type="text" name="dias"><br><br>
            <input class="boton" type="submit" value="Reservar">
        </form>
    </div>
</body>
</html>