<?php
require('../../../shared/header.php');
require('../../../db/conn.php');
$conn = connection();

$artistas_query = "SELECT * FROM artista";
$albumes_query = "SELECT album.nombre as albumNombre, artista.*, album.fecha as albumFecha, album.id as albumId FROM album INNER JOIN artista_album ON artista_album.id_album = album.id INNER JOIN artista ON artista.id = artista_album.id_artista;";
$canciones_query = "SELECT * FROM cancion";
?>
<?php // phpinfo() ?>
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
                            <img src="https://source.unsplash.com/200x20<?php echo rand(0, 9);?>/?album,cover" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row_1['nombre']; ?></h5>
                                    <p class="card-text">
                                        <?php echo substr($row_1['descripcion'], 0, 25) . (strlen($row_1['descripcion']) > 25 ? '...' : ''); ?>
                                    </p>
                                    <a href="./artista.php?id=<?php echo $row_1['id'];?>" class="stretched-link"></a>
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
                <?php
                if($result_2 = $conn->query($albumes_query)):
                    while($row_2  = $result_2->fetch_assoc()): 
                ?>
                        <div class="col-xs-12 col-sm-12 col-md-3">
                            <div class="card shadow position-relative">
                            <img src="https://source.unsplash.com/200x20<?php echo rand(0, 9);?>/?album,cover" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo substr($row_2['albumNombre'], 0, 20) . (strlen($row_2['albumNombre']) > 20 ? '...' : ''); ?></h5>
                                    <span class="text-muted"><?php echo $row_2['nombre']; ?></span>
                                    <a href="./album.php?id=<?php echo $row_2['albumId']; ?>" class="stretched-link"></a>
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
            <h2>Canciones</h2>
        </div>
        <div class="col-12 canciones__section mb-5">
            <div class="row">
                <?php
                if($result_3 = $conn->query($canciones_query)):
                    while($row_3  = $result_3->fetch_assoc()): 
                ?>
                        <div class="col-xs-12 col-sm-12 col-md-3">
                            <div class="card shadow position-relative">
                            <img src="https://source.unsplash.com/200x20<?php echo rand(0, 9);?>/?album,cover" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row_3['nombre']; ?></h5>
                                    <a href="./cancion.php?id=<?php echo $row_3['id'];?>" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif; 
                ?>
            </div>
        </div>
    </div>
</div>
<?php require('../../../shared/footer.php') ?>
