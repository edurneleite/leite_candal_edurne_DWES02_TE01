<?php
session_start();
require 'coches.php';
require 'usuarios.php';

$rojo = "#f9a899";
$verde = '#a9f999';
// FUNCIONES
//Nombre y apellido no pueden estar vacios
function validarNombre($nombre){
    global $verde, $rojo;
    if ($nombre){
        return $verde;
    } else {
        return $rojo;
    }
}
function validarApellido($apellido){
    global $verde, $rojo;
    if ($apellido == ""){
        return $rojo;
    } else {
        return $verde;
    }
}
//Validacion modulo 23
function validarDni($dni){
    global $verde, $rojo;
    $letraDni = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
    $letra = strtoupper(substr($dni, -1));
    $dniSin = substr($dni, 0, -1);
    $resto = intval($dni) % 23;
    if($letra == $letraDni[$resto]){
        return $verde;
    } else {
        return $rojo;
    }
}
//Fecha inicio posterior a fecha actual
function validarFecha($fecha){
    global $verde, $rojo;
    $fechaActual = new DateTime();
    $fechaRent = new DateTime($fecha);
    if ($fechaRent > $fechaActual && $fecha != null){
        return $verde;
    } else {
        return $rojo;
    }
}
//Duracion de 1 a 30 dias
function validarDias($dias){
    global $verde, $rojo;
    if ($dias > 0 && $dias <= 30){
        return $verde;
    } else {
        return $rojo;
    }
}
//Validar si el usuario existe
function validarUsuario($nombre, $apellido, $dni, $usuarios){
    global $verde, $rojo;
    foreach ($usuarios as $usuario){
        if (strtoupper($usuario['nombre']) == strtoupper($nombre) && strtoupper($usuario['apellido']) == strtoupper($apellido) && strtoupper($usuario['dni']) == strtoupper($dni)){
            return $verde;
        } else {
            return $rojo;
        }       
    }
}
//Validar si esta libre el coche
function validarModelo($coches, $modelo){
    global $verde, $rojo;
    foreach ($coches as $coche) { 
        if (strtoupper($coche['modelo']) == strtoupper($modelo) && $coche['disponible'] == true) { 
            return $verde;
        } 
    }
    return $rojo;
}

// MAIN - Ejecutar al pulsar boton
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $_SESSION['nombre']= $_POST['nombre'];
    $_SESSION['apellido'] = $_POST['apellido'];
    $_SESSION['dni'] = $_POST['dni'];
    $_SESSION['modelo'] = $_POST['modelo'];
    $_SESSION['fecha'] = $_POST['fecha'];
    $_SESSION['dias'] = $_POST['dias'];
    //Validar todos los datos
    $_SESSION['nombreValidado'] = validarNombre($_SESSION['nombre']);
    $_SESSION['apellidoValidado'] = validarApellido($_SESSION['apellido']);
    $_SESSION['dniValidado'] = validarDni($_SESSION['dni']);
    $_SESSION['fechaValidado'] = validarFecha($_SESSION['fecha']);
    $_SESSION['diasValidado'] = validarDias($_SESSION['dias']);
    $_SESSION['modeloValidado'] = validarModelo($coches, $_SESSION['modelo']);
    $_SESSION['usuarioValidado'] = validarUsuario($_SESSION['nombre'], $_SESSION['apellido'], $_SESSION['dni'], $usuarios);
    
    if ($_SESSION['nombreValidado'] == $verde && $_SESSION['apellidoValidado'] == $verde && $_SESSION['dniValidado'] == $verde && $_SESSION['fechaValidado'] == $verde && $_SESSION['diasValidado'] == $verde) { 
        if ($_SESSION['modeloValidado'] == $verde && $_SESSION['usuarioValidado'] == $verde) { 
            header('Location: confirmada.php'); 
            exit(); 
        } else { 
            header('Location: fallida.php'); 
            exit(); 
        }
    } else { 
        header('Location: fallida.php'); 
        exit(); 
    }
}
?>
