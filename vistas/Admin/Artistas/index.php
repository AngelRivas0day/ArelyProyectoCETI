<?php require('../../../shared/header.php') ?>
<?php
if($_SESSION['user']['role'] != 'admin'){
    header('Location: http://localhost:8080/CETI/PincheArely');
}
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
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="card w-100 item-card">
                        <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-body text-right">
                            <a href="#" class="card-link btn btn-primary">Borrar</a>
                            <a href="#" class="card-link btn btn-warning">Editar</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="card w-100 item-card">
                        <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-body text-right">
                            <a href="#" class="card-link btn btn-primary">Borrar</a>
                            <a href="#" class="card-link btn btn-warning">Editar</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="card w-100 item-card">
                        <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-body text-right">
                            <a href="#" class="card-link btn btn-primary">Borrar</a>
                            <a href="#" class="card-link btn btn-warning">Editar</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="card w-100 item-card">
                        <img src="https://via.placeholder.com/200x200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-body text-right">
                            <a href="#" class="card-link btn btn-primary">Borrar</a>
                            <a href="#" class="card-link btn btn-warning">Editar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('../../../shared/footer.php') ?>
