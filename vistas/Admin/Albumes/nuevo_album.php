<?php
require('../../../shared/header.php');
require('../../../db/conn.php');
$album = array();
$conn = connection();
$artistas_query = "SELECT * FROM artista";
if($_GET['id']){
    $id = $_GET['id'];
    $cardHeader = "Editar album";
    $album_query = "SELECT album.*, artista.id as artistaId, artista_album.id as sharedId FROM album INNER JOIN artista_album ON artista_album.id_album = album.id INNER JOIN artista ON artista.id = artista_album.id_artista WHERE album.id = $id";
    if($result = $conn->query($album_query)){
        $album = $result->fetch_assoc();
    }
}else{
    $cardHeader = "Nuevo album";
}
?>
<div class="container">
    <div class="row">
        <div class="col-xs-10 offset-xs-1 col-sm-10 offset-md-1 col-md-6 offset-md-3 mt-5 mb-4">
            <div class="card shadow-lg">
                <h3 class="card-header"><?php echo $cardHeader; ?></h3>
                <div class="card-body">
                    <form action="../../../controladores/album.php<?php echo $_GET['id'] ? "?id=$id" : '' ; ?>" method="POST" class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" placeholder="e.g. John Wick" value="<?php echo $album['nombre']; ?>" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" name="fecha" class="form-control" placeholder="e.g. Indie" value="<?php echo $album['fecha']; ?>" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Artista</label>
                            <select name="id_artista" class="form-select" required>
                                <option selected>Selecciona uno...</option>
                                <?php
                                    if($result_ = $conn->query($artistas_query)):
                                        while ($row_ = $result_->fetch_assoc()): ?>
                                            <option value="<?php echo $row_['id']; ?>" <?php echo $row_['id'] == $album['artistaId'] ? 'selected' : '' ;?>><?php echo $row_['nombre'] ?></option>
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
                                <input type="hidden" name="shared_id" value="<?php echo $album['sharedId']; ?>">
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
