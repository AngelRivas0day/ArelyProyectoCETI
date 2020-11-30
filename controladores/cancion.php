<?php
require('../db/conn.php');
require('../shared/_vars.php');
session_start();
$conn = connection();
$target_dir = "http://localhost:8080/CETI/PincheArely/files/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST['create'])){
    if(
        isset($_POST['nombre']) &&
        isset($_FILES['file'])
    ){
        $name = $_POST['nombre'];
        $query = "INSERT INTO cancion ('nombre', 'file') VALUES ('$name','$target_file')";
        if($conn->query($query) === TRUE){
            $last_id = mysqli_insert_id($conn);
            $query_2 = "INSERT INTO artista_album (id_album, id_artista) VALUES ($last_id,$id_artista);";
            if($conn->query($query_2) === TRUE){
                header("Location: $listadoCanciones");
            }else{
                header("Location: $listadoCanciones");
            }
            $_SESSION['create_album_message'] = FALSE;
        }else{
            $_SESSION['create_album_message'] = TRUE;
        }
    }
}
if(isset($_POST['update'])){
    if(
        isset($_POST['nombre']) &&
        isset($_POST['fecha']) &&
        isset($_POST['id_artista'])
    ){
        $id = $_GET['id'];
        $shared_id = $_POST['shared_id'];
        $name = $_POST['nombre'];
        $fecha = $_POST['fecha'];
        $id_artista = $_POST['id_artista'];
        $query = "UPDATE album SET nombre = '$name', fecha = '$fecha' WHERE id = $id;";
        if($conn->query($query) === TRUE){
            $query_2 = "UPDATE artista_album SET id_artista = $id_artista WHERE id = $shared_id;";
            if($conn->query($query_2) === TRUE){
                header("Location: $listadoCanciones");
            }else{
                header("Location: $listadoCanciones");
            }
            $_SESSION['update_album_message'] = FALSE;
        }else{
            header("Location: $formCancion?id=$id");
            $_SESSION['update_album_message'] = TRUE;
        }
    }
}
if(isset($_GET['delete'])){
    if(
        isset($_GET['id'])
    ){
        echo 
        $id = $_GET['id'];
        $query = "DELETE FROM album WHERE id = $id";
        if($conn->query($query) === TRUE){
            header("Location: $listadoCanciones");
        }else{
            header("Location: $listadoCanciones");
        }
    }
}

?>