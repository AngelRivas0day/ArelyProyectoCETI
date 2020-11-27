<?php require('../../../shared/header.php') ?>
    <div class="container">
        <div class="row">
            <div class="login-container">
                <div class="card">
                    <div class="card-body">
                        <form action="index.php" class="row w-100">
                            <div class="col-12 mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Correo</label>
                              <input type="email" class="form-control" placeholder="name@example.com" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Contrase&ntilde;a</label>
                                <input type="password" class="form-control" required>
                            </div>
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary mb-3">Iniciar sesión</button>
                            </div>
                            <div class="col-12 text-center">
                                <a href="./register.php" name="button">¿No tienes una cuenta?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require('../../../shared/footer.php') ?>
