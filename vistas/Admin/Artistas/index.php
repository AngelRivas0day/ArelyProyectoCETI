<?php
require('../../../shared/header.php');
require('../../../db/conn.php');
$conn = connection();
if($_SESSION['user']['role'] != 'admin'){
    header('Location: http://localhost:8080/CETI/Producto/vistas/Admin/Auth/login.php');
}
$artistas_query = "SELECT * FROM artista";
?>
<div class="container">
    <div class="row">
        <div class="col-12 mt-5 mb-4">
            <a href="./nuevo_artista.php" class="btn btn-primary">
                Nuevo artista
            </a>
        </div>
        <div class="col-12">
            <div class="row">
                <?php
                if($result = $conn->query($artistas_query)):
                    while($row  = $result->fetch_assoc()):
                ?>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 mb-3">
                            <div class="card w-100 item-card">
                                <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $row['nombre'];?></h4>
                                    <span class="muted-text"><?php echo $row['genero']; ?></span>
                                    <p class="card-text">
                                        <?php echo $row['descripcion']; ?>
                                    </p>
                                </div>
                                <div class="card-body text-right">
                                    <a href="./nuevo_artista.php?id=<?php echo $row['id']; ?>" class="card-link btn btn-primary">Editar</a>
                                    <a href="../../../controladores/artistas.php?id=<?php echo $row['id']; ?>&delete=TRUE" class="card-link btn btn-warning">Borrar</a>
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
