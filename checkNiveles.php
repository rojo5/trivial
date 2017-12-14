<?php
// Este archivo se enccarga de extraer los niveles del usuario
$user = $_POST['usuario'];

//$user = "rojo5";
//echo 'HOLAAAAAAAAAAAAAAAAAAAAAAAAAA';
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

function consultaNiveles($sql) {
    //Conexion a la BBDD
    $conexion = conectar();

    //Consulta
    mysqli_set_charset($conexion, "utf8");

    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) {
        die();
    }

    $arrayNiveles['niveles'] = array();

    while ($row = mysqli_fetch_object($resultado)) {
        //guardo cada fila en un array
        array_push($arrayNiveles['niveles'], $row);
    }
    desconectar($conexion);
    return $arrayNiveles;
}
//Abro un archivo json
$archivo2 = "js/niveles.json";
$file = fopen($archivo2, "w");

$sql = "SELECT nvHistoria, nvLengua, nvEconomia, nvIngles, nvFilosofia FROM usuarios WHERE usuario = '$user'";

$niveles = consultaNiveles($sql);
print_r($niveles);
//Codifico el resultado de la consulta en una estructura de JSON
$contenido = json_encode($niveles, 128);

fwrite($file, $contenido);

fclose($archivo2);
