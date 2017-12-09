<?php

session_start();

define('DB_HOST', 'localhost');
define('DB_DATABASE', 'trivial');
define('DB_USER', 'root');
define('DB_PASS', '');


$conex = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
if ($conex->connect_errno > 0) {
    die("Imposible conectarse con la base de datos [" . $conex->connect_error . "]");
}

$username = $_POST['usuario'];
$password = $_POST['clave'];

$sql = "SELECT * FROM usuarios WHERE usuario =  '$username'";

$result = $conex->query($sql);

if ($result->num_rows > 0) {
    
}

$row = $result->fetch_array(MYSQLI_ASSOC);
if ($password === $row['password']) {


    $close = mysqli_close($conex);
    header('Location: trivial.php?usuario=' . $row['usuario'] . '&ingles=' . $row['nvIngles'] . '&historia=' . $row['nvHistoria'] . '&lengua=' . $row['nvLengua'] . '&economia=' . $row['nvEconomia'] . '&filosofia=' . $row['nvFilosofia']);
} else {

    header('Location: index.php?incorrecto=true');
}