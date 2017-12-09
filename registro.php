<?php

$usuario = $_POST['rUsuario'];
$mail = $_POST['rMail'];
$passwd = $_POST['rPass'];
$passwd2 = $_POST['rPass2'];
//$usuario = 'pepe';
//$mail = 'pepe@pepe.es';
//$passwd = '123';
//$passwd2 = '123';

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



    //Conexion a la BBDD 
    $conexion = conectar();

    //Consulta
    mysqli_set_charset($conexion, "utf8");
    $compruebaUser = "SELECT * FROM usuarios WHERE usuario ='$usuario'";

    $resultado = mysqli_query($conexion, $compruebaUser);

    $existe = mysqli_num_rows($resultado);

    if ($existe == 1) {
        header('Location: index.php?existe=true');
    } elseif ($passwd != $passwd2) {
        header('Location: index.php?passIncorrecta=true');
    }
        $insertar ="INSERT INTO usuarios (usuario, correo, password) VALUES ( '$usuario', '$mail', '$passwd')";
    
        if($resultado = mysqli_query($conexion,$insertar)){
            header('Location: index.php?registro=true');
        }
        desconectar($conexion);


