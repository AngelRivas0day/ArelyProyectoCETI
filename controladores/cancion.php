<?php
require('../db/conn.php');
require('../shared/_vars.php');
session_start();
$conn = connection();
if(isset($_FILES['file'])){
    $target_dir = "../files/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
} 
if(isset($_POST['create'])){
    if(
        isset($_POST['nombre']) &&
        isset($_FILES['file'])
    ){
        $id_album = $_POST['id_album'];
        $name = $_POST['nombre'];
        $query = "INSERT INTO cancion (nombre, file) VALUES ('$name','$target_file')";
        if($conn->query($query) === TRUE){
            $last_id = mysqli_insert_id($conn);
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $query_2 = "INSERT INTO album_cancion (id_cancion, id_album) VALUES ($last_id, $id_album);";
                if($conn->query($query_2) === TRUE){
                    header("Location: $listadoCanciones");
                }else{
                    header("Location: $listadoCanciones");
                }
            }else{
                $_SESSION['create_album_message'] = TRUE;
            }
            $_SESSION['create_album_message'] = FALSE;
        }else{
            echo $conn->error;
            $_SESSION['create_album_message'] = TRUE;
        }
    }
}
if(isset($_POST['update'])){
    if(
        isset($_POST['nombre']) &&
        isset($_POST['id_album'])
    ){
        $id = $_GET['id'];
        $shared_id = $_POST['shared_id'];
        $name = $_POST['nombre'];
        $id_album = $_POST['id_album'];
        if(isset($_FILES['file'])){
            $query = "UPDATE cancion SET nombre = '$name', file = '$target_file' WHERE id = $id;";
        }else{
            $query = "UPDATE cancion SET nombre = '$name' WHERE id = $id;";
        }
        if($conn->query($query) === TRUE){
            $query_2 = "UPDATE album_cancion SET id_album = $id_album WHERE id = $shared_id;";
            if(isset($_FILES['file'])){
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    $query_2 = "INSERT INTO album_cancion (id_cancion, id_album) VALUES ($last_id, $id_album);";
                    if($conn->query($query_2) === TRUE){
                        header("Location: $listadoCanciones");
                    }else{
                        header("Location: $listadoCanciones");
                    }
                }else{
                    $_SESSION['create_album_message'] = TRUE;
                }
            }else{
                $query_2 = "INSERT INTO album_cancion (id_cancion, id_album) VALUES ($last_id, $id_album);";
                if($conn->query($query_2) === TRUE){
                    header("Location: $listadoCanciones");
                }else{
                    header("Location: $listadoCanciones");
                } 
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
        $query = "DELETE FROM cancion WHERE id = $id";
        if($conn->query($query) === TRUE){
            header("Location: $listadoCanciones");
        }else{
            header("Location: $listadoCanciones");
        }
    }
}

?>