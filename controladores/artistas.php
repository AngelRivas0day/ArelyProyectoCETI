<?php
require('../db/conn.php');
require('../shared/_vars.php');
session_start();
$conn = connection();
if(isset($_POST['create'])){
    if(
        isset($_POST['nombre']) &&
        isset($_POST['genero']) &&
        isset($_POST['descripcion'])
    ){
        $name = $_POST['nombre'];
        $genero = $_POST['genero'];
        $desc = $_POST['descripcion'];
        $query = "INSERT INTO artista (nombre, genero, descripcion) VALUES ('$name','$genero','$desc')";
        if($conn->query($query) === TRUE){
            header("Location: $adminDashboard");
        }else{
        }
    }
}
if(isset($_POST['update'])){
    if(
        isset($_POST['nombre']) &&
        isset($_POST['genero']) &&
        isset($_POST['descripcion'])
    ){
        $id = $_GET['id'];
        $name = $_POST['nombre'];
        $genero = $_POST['genero'];
        $desc = $_POST['descripcion'];
        $query = "UPDATE artista SET nombre = '$name', genero = '$genero', descripcion= '$desc' WHERE id = $id;";
        if($conn->query($query) === TRUE){
            header("Location: $adminDashboard");
        }else{
            header("Location: $formArtista?id=$id");
        }
    }
}
if(isset($_GET['delete'])){
    if(
        isset($_GET['id'])
    ){
        echo 
        $id = $_GET['id'];
        $query = "DELETE FROM artista WHERE id = $id";
        if($conn->query($query) === TRUE){
            header("Location: $adminDashboard");
        }else{
            header("Location: $adminDashboard");
        }
    }
}

?>