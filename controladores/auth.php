<?php
require('../db/conn.php');
session_start();
$conn = connection();
if (isset($_POST['login'])) { // vemos is estamos intentado hacer login
    if(
        isset($_POST['email']) &&
        isset($_POST['password'])
    ){ // verificamos que la información venga
        $email = $_POST['email'];
        $password = $_POST['password'];
        $encPassword = sha1($password);
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$encPassword'";
        if($result = $conn->query($query)){
            echo $result;
        }
    }
}
if(isset($_POST['register'])){ // vemos si estamos intentando registrarnos
    if(isset($_POST['email']) && isset($_POST['password'])){ // verificamos que la información venga
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "INSERT INTO users SET ('$email','$password')";

    }
}
session_destroy();
?>
