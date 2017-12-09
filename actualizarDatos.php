<?php

$asignatura = $_POST['materia'];
$nivel = $_POST['nivel'];
$user = $_POST['usuario'];

function conectar() {

    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "trivial";

    $conexion = mysqli_connect($server, $user, $pass, $bd);

    if ($conexion) {
        echo 'La conexion de la base de datos se ha hecho satisfactoriamente
';
    } else {
        echo 'Ha sucedido un error inexperado en la conexion de la base de datos
';
    }

    return $conexion;
}

function desconectar($conexion) {

    $close = mysqli_close($conexion);

    if ($close) {
        echo 'La desconexion de la base de datos se ha hecho satisfactoriamente
';
    } else {
        echo 'Ha sucedido un error inexperado en la desconexion de la base de datos
';
    }
}

function actualizarNivel($sql) {
    //Conexion a la BBDD 
    $conexion = conectar();

    //Consulta
    mysqli_set_charset($conexion, "utf8");

    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) {
        die();
    }
}

//UPDATE `usuarios` SET `nvLengua` = '6' WHERE `usuarios`.`id` = 2

$sql = "UPDATE usuarios SET $asignatura = '$nivel' WHERE usuario = '$user'";

actualizarNivel($sql);
