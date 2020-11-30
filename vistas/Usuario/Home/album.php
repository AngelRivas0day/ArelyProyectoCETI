<?php 
require('../../../shared/header.php');
require('../../../db/conn.php');
$conn = connection();
if($conn->connect_errno){
    echo "Hubo un error...";
}
if(isset($_GET['id'])):
$id = $_GET['id'];
// $canciones_query = "SELECT cancion.* FROM album INNER JOIN album_cancion ON album_cancion.id_album = album.id INNER JOIN cancion ON album_cancion.id_cancion = cancion.id WHERE album.id = $id";
$canciones_query = "SELECT cancion.* FROM album_cancion INNER JOIN album ON album.id = album_cancion.id_album INNER JOIN cancion ON cancion.id = album_cancion.id_cancion WHERE album.id = $id";
$album_artista_query = "SELECT album.nombre AS albumNombre, album.fecha AS albumFecha, artista.* FROM artista INNER JOIN album ON album.id = $id";
    if($result = $conn->query($album_artista_query)):
        while($row = $result->fetch_assoc()):
?>
<div class="artist_header">
    <img src="https://source.unsplash.com/1200x800/?musician,male" alt="">
</div>
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-12 mb-3">
            <h1><?php echo $row['albumNombre']; ?></h1>
            <a href="./artista.php?id=<?php echo $row['id']?>" class="text-muted"><?php echo $row['nombre']; ?></a>
        </div>
        <?php
        if($result = $conn->query($canciones_query)):
            while($row_ = $result->fetch_assoc()):
        ?>
                <div class="col-12">
                    <div class="song_item position-relative">
                    <img src="https://source.unsplash.com/50x5<?php echo rand(0, 8);?>/?album,cover" class="card-img-top" alt="...">                        <div class="item_info">
                            <h5 class="mb-0 info_song-name"><?php echo $row_['nombre'];?></h5>
                            <span class="info_song-feats muted-text">test</span>
                        </div>
                        <a class="stretched-link" href="./cancion.php?id=<?php echo $row_['id'];?>"></a>
                    </div>
                </div>
        <?php
            endwhile;
        endif;
        ?>
    </div>
</div>
<?php
        endwhile;
    endif;
endif;
require('../../../shared/footer.php');
?>
