<?php
require('../../../shared/header.php');
require('../../../db/conn.php');
$artista = array();
if($_GET['id']){
    $conn = connection();
    $id = $_GET['id'];
    $cardHeader = "Editar artista";
    $artista_query = "SELECT * FROM artista WHERE id = $id";
    if($result = $conn->query($artista_query)){
        $artista = $result->fetch_assoc();
    }
}else{
    $cardHeader = "Nuevo artista";
}
?>
<div class="container">
    <div class="row">
        <div class="col-xs-10 offset-xs-1 col-sm-10 offset-md-1 col-md-6 offset-md-3 mt-5 mb-4">
            <div class="card shadow-lg">
                <h3 class="card-header"><?php echo $cardHeader; ?></h3>
                <div class="card-body">
                    <form action="../../../controladores/artistas.php<?php echo $_GET['id'] ? "?id=$id" : '' ; ?>" method="POST" class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" placeholder="e.g. John Wick" value="<?php echo $artista['nombre']; ?>" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">G&eacute;nero</label>
                            <input type="text" name="genero" class="form-control" placeholder="e.g. Indie" value="<?php echo $artista['genero']; ?>" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Descripci&oacute;n</label>
                            <textarea class="form-control" name="descripcion" rows="3" required><?php echo $artista['descripcion']; ?></textarea>
                        </div>
                        <div class="col-12 messages">
                            <?php if($_SESSION['create_artist_message']): ?>
                                <p class="text-warning">Hubo un error al crear el artista</p>
                            <?php endif; ?>
                            <?php if($_SESSION['update_artist_message']): ?>
                                <p class="text-warning">Hubo un error al actualizar el artista</p>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 text-right">
                            <?php if($_GET['id']): ?>
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
