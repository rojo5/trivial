<?php


$asignatura = $_POST['materia'];
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

function obtenerArraySQL($sql) {

        //Conexion a la BBDD
        $conexion = conectar();

        //Consulta
        mysqli_set_charset($conexion, "utf8");

        $resultado = mysqli_query($conexion, $sql);

        if (!$resultado) {
            die();
        }

        $arrayPreguntas['pregunta'] = array();//Crear array
        //Guardar la consulta en un array

        $i = 0;

        while ($row = mysqli_fetch_object($resultado)) {
//            $arrayPreguntas[$i] = $row;
//            $i++;
        array_push($arrayPreguntas['pregunta'], $row);
         
        }
        desconectar($conexion);

        return $arrayPreguntas;
    }
  
    
    $archivo="js/preguntas.json";
    $file= fopen($archivo, "w");
    
    $sql = "SELECT tema, enunciado, r1, r2, r3, r4, correcta FROM preguntas WHERE tema = '$asignatura' ORDER BY tema ASC";
    
    $preguntas = obtenerArraySQL($sql);
    $contenidoJson= json_encode($preguntas, 128);
    fwrite($file, $contenidoJson);
    
    fclose($file);
    
    
    