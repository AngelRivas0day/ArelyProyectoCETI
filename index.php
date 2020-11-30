<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: http://localhost:8080/CETI/PincheArely/vistas/Usuario/Auth/login.php');
}else if(isset($_SESSION['user']) && $_SESSION['user_role'] == 'admin'){
    header('Location: http://localhost:8080/CETI/PincheArely/vistas/Admin/Artistas/');
}else if(isset($_SESSION['user']) && $_SESSION['user_role'] == 'client'){
    header('Location: http://localhost:8080/CETI/PincheArely/vistas/Usuario/Artistas/');
}
session_destroy();
?>
