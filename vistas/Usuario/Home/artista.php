<?php 
require('../../../shared/header.php');
require('../../../db/conn.php');
$conn = connection();
if($conn->connect_errno){
    echo "Hubo un error...";
}
?>
<?php if(isset($_GET['id'])): ?>
<?php
$id = $_GET['id'];
$artista_query = "SELECT * FROM artista WHERE id = $id";
    if($result = $conn->query($artista_query)):
        while($row = $result->fetch_assoc()):
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <h1><?php echo $row['nombre']; ?></h1>
            <p class="w-50">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos iste provident corrupti amet inventore recusandae nam beatae totam ducimus nesciunt.</p>
        </div>
        <div class="col-12">
            <h2>Albumes</h2>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="card shadow position-relative">
                        <div class="card-body">
                            <h5 class="card-title">Lorem ipsum</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, repellendus.
                            </p>
                            <a href="./cancion.php?id=1" class="stretched-link">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
        endwhile;
    endif;
endif;
?>
<?php require('../../../shared/footer.php') ?>
