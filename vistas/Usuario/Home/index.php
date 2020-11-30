<?php
require('../../../shared/header.php');
require('../../../db/conn.php');
$conn = connection();

$artistas_query = "SELECT * FROM artista";
$albumes_query = "SELECT * FROM album";
$canciones_query = "SELECT * FROM cancion";
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <h2>Artistas</h2>
        </div>
        <div class="col-12 artists__section mb-4">
            <div class="row">
                <?php
                if($result_1 = $conn->query($artistas_query)):
                    while($row_1  = $result_1->fetch_assoc()):
                ?>
                        <div class="col-xs-12 col-sm-12 col-md-3">
                            <div class="card shadow position-relative">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row_1['nombre']; ?></h5>
                                    <p class="card-text">
                                        <?php echo $row_1['descripcion'];?>
                                    </p>
                                    <a href="./artista.php?id=<?php echo $row_1['id'];?>" class="stretched-link">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
        <div class="col-12">
            <h2>Albumes</h2>
        </div>
        <div class="col-12 albumes__section mb-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="card shadow position-relative">
                        <div class="card-body">
                            <h5 class="card-title">Lorem ipsum</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, repellendus.
                            </p>
                            <a href="./album.php?id=1" class="stretched-link">Go somewhere</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="col-12">
            <h2>Canciones</h2>
        </div>
        <div class="col-12 canciones__section mb-4">
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
<?php require('../../../shared/footer.php') ?>
