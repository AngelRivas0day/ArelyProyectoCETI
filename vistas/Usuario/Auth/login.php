<?php require('../../../shared/header.php') ?>
    <div class="container">
        <div class="row">
            <div class="login-container">
                <div class="card">
                    <div class="card-body">
                        <form action="../../../controladores/auth.php" method="POST" class="row w-100">
                            <div class="col-12 mb-3">
                              <label class="form-label">Correo</label>
                              <input type="email" name="correo" class="form-control" placeholder="name@example.com" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Contrase&ntilde;a</label>
                                <input type="password" name="contrasena" class="form-control" required>
                            </div>
                            <?php if($_SESSION['user_login_error'] == TRUE): ?>
                                <div class="col-12">
                                    <p class="text-warning"><?php echo "Hubo un error al iniciar sesión"; ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="col-12 text-right">
                                <input type="hidden" name="login">
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
