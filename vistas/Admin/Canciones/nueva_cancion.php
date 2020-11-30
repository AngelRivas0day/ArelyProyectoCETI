<?php
require('../../../shared/header.php');
require('../../../db/conn.php');
$cancion = array();
$conn = connection();
// SELECT album.* FROM album INNER JOIN artista_album ON artista_album.id_album = album.id
$albumes_query = "SELECT album.* FROM album INNER JOIN artista_album ON artista_album.id_album = album.id ";
if($_GET['id']){
    $id = $_GET['id'];
    $cardHeader = "Editar canción";
    // $cancion_query = "SELECT artista.id as artistaId, cancion.*, album.id as albumId, album_cancion.id as sharedId FROM cancion INNER JOIN album_cancion ON album_cancion.id_cancion = cancion.id INNER JOIN album ON album.id = album_cancion.id_album WHERE cancion.id = $id";
    $cancion_query = "SELECT cancion.*, artista.id as artistaId, album.id as albumId, album_cancion.id as sharedId FROM cancion INNER JOIN album_cancion ON album_cancion.id_cancion = cancion.id INNER JOIN album ON album.id = album_cancion.id_album INNER JOIN artista_album ON artista_album.id_album = album.id INNER JOIN artista ON artista.id = artista_album.id_artista WHERE cancion.id = $id";
    if($result = $conn->query($cancion_query)){
        $cancion = $result->fetch_assoc();
    }
}else{
    $cardHeader = "Nueva canción";
}
?>
<div class="container">
    <div class="row">
        <div class="col-xs-10 offset-xs-1 col-sm-10 offset-md-1 col-md-6 offset-md-3 mt-5 mb-4">
            <div class="card shadow-lg">
                <h3 class="card-header"><?php echo $cardHeader; ?></h3>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="../../../controladores/cancion.php<?php echo $_GET['id'] ? "?id=$id" : '' ; ?>" method="POST" class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" placeholder="e.g. John Wick" value="<?php echo $cancion['nombre']; ?>" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Canci&oacute;n</label>
                            <input type="file" name="file" class="form-control" value="<?php echo $cancion['file']; ?>">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Album</label>
                            <select name="id_album" class="form-select" required>
                                <option selected>Selecciona uno...</option>
                                <?php
                                    if($result_ = $conn->query($albumes_query . ( isset($_GET['id']) ? "WHERE artista_album.id_artista = " . $cancion['artistaId'] : ';'))):
                                        while ($row_ = $result_->fetch_assoc()): ?>
                                            <option value="<?php echo $row_['id']; ?>" <?php echo $row_['id'] == $cancion['albumId'] ? 'selected' : '' ;?>><?php echo $row_['nombre'] ?></option>
                                <?php   endwhile;
                                        $result_->free_result();
                                    endif;
                                ?>
                            </select>
                        </div>
                        <div class="col-12 messages">
                            <?php if($_SESSION['create_artist_message'] == TRUE): ?>
                                <p class="text-warning">Hubo un error al crear el album.</p>
                            <?php endif; ?>
                            <?php if($_SESSION['update_artist_message'] == TRUE): ?>
                                <p class="text-warning">Hubo un error al actualizar el album.</p>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 text-right">
                            <?php if($_GET['id']): ?>
                                <input type="hidden" name="shared_id" value="<?php echo $cancion['sharedId']; ?>">
                                <input type="hidden" name="update">
                            <?php else: ?>
                                <input type="hidden" name="create">
                            <?php endif; ?>
                            <a href="./index.php" class="btn btn-warning">Volver</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('../../../shared/footer.php') ?>
