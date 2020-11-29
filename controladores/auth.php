<?php
require('../db/conn.php');
require('../shared/_vars.php');
session_start();
$conn = connection();
if (isset($_POST['login'])) { // vemos si estamos intentado hacer login
    if(
        isset($_POST['correo']) &&
        isset($_POST['contrasena'])
    ){ // verificamos que la información venga
        $email = $_POST['correo'];
        $password = $_POST['contrasena'];
        $encPassword = sha1($password);
        $query = "SELECT * FROM usuario WHERE correo = '$email' AND contrasena = '$encPassword'";
        if($result = $conn->query($query)){
            if(mysqli_num_rows($result) == 0){
                header("Location: $userLogin");
                $_SESSION['user_login_error'] = TRUE;
            }else{
                while($row = $result->fetch_assoc()){
                    $_SESSION['user'] = array(
                        'nombre' => $row['nombre'],
                        'role' => 'user',
                        'email' => $row['correo']
                    );
                    $_SESSION['isAuth'] = TRUE;
                    $_SESSION['user_login_error'] = FALSE;
                }
                header("Location: $userHome");
            }
        }else{
            header("Location: $userLogin");
            $_SESSION['user_login_error'] = TRUE;
        }
    }
}
if(isset($_POST['register'])){ // vemos si estamos intentando registrarnos
    if(
        isset($_POST['correo']) && 
        isset($_POST['contrasena']) && 
        isset($_POST['nombre'])
    ){ // verificamos que la información venga
        $name = $_POST['nombre'];
        $email = $_POST['correo'];
        $password = $_POST['contrasena'];
        $encPassword = sha1($password);
        $query = "INSERT INTO usuario (nombre, correo, contrasena) VALUES ('$name','$email','$encPassword')";
        if($conn->query($query) === TRUE){
            header("Location: '$userLogin");
        }else{
            echo "Hubo un error";
            echo $conn->error;
        }
    }
}
?>
