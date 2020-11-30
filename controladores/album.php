<?php
require('../db/conn.php');
require('../shared/_vars.php');
session_start();
$conn = connection();
if(isset($_POST['create'])){
    if(
        isset($_POST['nombre']) &&
        isset($_POST['fecha']) &&
        isset($_POST['id_artista'])
    ){
        $name = $_POST['nombre'];
        $fecha = $_POST['fecha'];
        $id_artista = $_POST['id_artista'];
        $query = "INSERT INTO album (nombre, fecha) VALUES ('$name','$fecha')";
        if($conn->query($query) === TRUE){
            $last_id = mysqli_insert_id($conn);
            $query_2 = "INSERT INTO artista_album (id_album, id_artista) VALUES ($last_id,$id_artista);";
            if($conn->query($query_2) === TRUE){
                header("Location: $listadoAlbumes");
            }else{
                header("Location: $listadoAlbumes");
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
                header("Location: $listadoAlbumes");
            }else{
                header("Location: $listadoAlbumes");
            }
            $_SESSION['update_album_message'] = FALSE;
        }else{
            header("Location: $formAlbum?id=$id");
            $_SESSION['update_album_message'] = TRUE;
        }
    }
}
if(isset($_GET['delete'])){
    if(
        isset($_GET['id'])
    ){
        $id = $_GET['id'];
        $query = "DELETE FROM album WHERE id = $id";
        if($conn->query($query) === TRUE){
            header("Location: $listadoAlbumes");
        }else{
            header("Location: $listadoAlbumes");
        }
    }
}

?>