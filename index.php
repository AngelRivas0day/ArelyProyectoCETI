<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: http://localhost:8080/CETI/Producto/vistas/Usuario/Auth/login.php');
}else if(isset($_SESSION['user']['role']) == 'admin'){
    // echo $_SESSION['user'];
    header('Location: http://localhost:8080/CETI/Producto/vistas/Admin/Artistas/index.php');
}else if(isset($_SESSION['user']['role']) == 'user'){
    // echo $_SESSION['user'];
    header('Location: http://localhost:8080/CETI/Producto/vistas/Usuario/Home/');
}
// session_destroy();
?>
