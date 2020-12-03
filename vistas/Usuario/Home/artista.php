<?php 
require('../../../shared/header.php');
require('../../../db/conn.php');
$conn = connection();
if($conn->connect_errno){
    echo "Hubo un error...";
}
if(isset($_GET['id'])):
$id = $_GET['id'];
$artista_query = "SELECT * FROM artista WHERE id = $id";
$albums_artista_query = "CALL obtenerAlbumesPorArtista($id);";
// $albums_artista_query = "SELECT album.* FROM album INNER JOIN artista_album ON artista_album.id_album = album.id WHERE artista_album.id_artista = $id";
    if($result = $conn->query($artista_query)):
        while($row = $result->fetch_assoc()):
?>
<div class="artist_header">
    <img src="https://source.unsplash.com/1200x800/?musician,male" alt="">
</div>
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <h1><?php echo $row['nombre']; ?></h1>
            <span class="text-muted">G&eacute;nero: <?php echo $row['genero']; ?></span>
            <p class="w-50"><?php echo $row['descripcion']; ?></p>
        </div>
        <div class="col-12">
            <h2>Albumes</h2>
        </div>
        <div class="col-12">
            <div class="row">
                <?php if($result = $conn->query($albums_artista_query)): ?>
                    <?php while($row_ = $result->fetch_assoc()): ?>
                        <div class="col-xs-12 col-sm-12 col-md-3">
                            <div class="card shadow position-relative">
                            <img src="https://source.unsplash.com/200x20<?php echo rand(0, 9);?>/?album,cover" class="card-img-top" alt="...">                                <div class="card-body">
                                    <h5 class="card-title"><?php echo substr($row_['nombre'], 0, 20) . (strlen($row_['nombre']) > 20 ? '...' : '') ;?></h5>
                                    <a href="./album.php?id=<?php echo $row_['id'];?>" class="stretched-link"></a>
                               </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
        endwhile;
    endif;
endif;
require('../../../shared/footer.php');
?>
