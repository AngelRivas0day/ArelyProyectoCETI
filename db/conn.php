<?php
function connection(){
    $user = "root";
    $passwd = "password";
    $server = "localhost";
    $db = "integrador_bases";
    $conn = mysqli_connect($server, $user, $passwd, $db) or die ("No se pudo establecer una conexión con la base de datos");
    
    return $conn;
}
?>
