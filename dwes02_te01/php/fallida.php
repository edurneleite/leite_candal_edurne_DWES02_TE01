<?php
require 'coches.php';
require 'usuarios.php';
include 'request.php';
$rojo = "#f9a899";
$verde = '#a9f999';

?>

<!------------------------------ RESERVA FALLIDA----------------------------------------->
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
        <p>Seleccione los datos de tu reserva</p></br></br>
        <p>Algunos datos no son correctos</p></br>
        <?php
            if ($_SESSION['usuarioValidado'] == $rojo){
                print '<p style="text-align:center; color:red;"><b>Usuario no registrado</b></p>';
            }
            if ($_SESSION['modeloValidado'] == $rojo){
                print '<p style="text-align:center;"><b>Coche no disponible</b></p>';
            }
        ?>
    </div>
    <div class="container">
        <form action="request.php" method="post">
            <label for="nombre">Nombre:</label><br>
            <input type="text" name="nombre" value="<?=$_SESSION['nombre']?>" style="background-color: <?=$_SESSION['nombreValidado']?>;"><br>
            <label for="apellido">Apellido:</label><br>
            <input type="text" name="apellido" value="<?=$_SESSION['apellido']?>" style="background-color: <?=$_SESSION['apellidoValidado']?>;"><br>
            <label for="dni">DNI:</label><br>
            <input type="text" name="dni" value="<?=$_SESSION['dni']?>" style="background-color: <?=$_SESSION['dniValidado']?>;"><br>
            <label for="modelo">Elige el modelo del vehiculo</label><br>
            <select id="modelo" name="modelo"> 
                <option value="Lancia Stratos" <?= $_SESSION['modelo'] == 'Lancia Stratos' ? 'selected' : '' ?>>Lancia Stratos</option> 
                <option value="Audi Quattro" <?= $_SESSION['modelo'] == 'Audi Quattro' ? 'selected' : '' ?>>Audi Quattro</option> 
                <option value="Ford Escort RS1800" <?= $_SESSION['modelo'] == 'Ford Escort RS1800' ? 'selected' : '' ?>>Ford Escort RS1800</option>
                <option value="Subaru Impreza 555" <?= $_SESSION['modelo'] == 'Subaru Impreza 555' ? 'selected' : '' ?>>Subaru Impreza 555</option> 
            </select><br>
            <label for="fecha">Fecha reserva:</label><br>
            <input type="date" name="fecha" value="<?=$_SESSION['fecha']?>" style="background-color: <?=$_SESSION['fechaValidado']?>;"><br>
            <label for="dias">Dias reserva:</label><br>
            <input type="text" name="dias" value="<?=$_SESSION['dias']?>" style="background-color: <?=$_SESSION['diasValidado']?>;"><br><br>
            <input class="boton" type="submit" value="Reservar">
        </form>
    </div>
</body>
</html>