<?php session_start(); ?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
        <link rel="stylesheet" href="http://localhost:8080/CETI/Producto/styles/login.css">
        <link rel="stylesheet" href="http://localhost:8080/CETI/Producto/styles/artists.css">
        <!-- Hay que cambiar esta madre para que no nos cague hahahaha -->
        <title>Hello, world!</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="http://localhost:8080/CETI/Producto/vistas/<?php echo $_SESSION['user']['role'] == 'user' ? 'Usuario/Home/' : 'Admin/Albumes/'; ?>">Spotifly</a>
            <?php if($_SESSION['user']['role'] == 'admin'): ?>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link" href="http://localhost:8080/CETI/Producto/vistas/Admin/Artistas/">Artistas</a>
                  <a class="nav-link" href="http://localhost:8080/CETI/Producto/vistas/Admin/Albumes/">Albumes</a>
                  <a class="nav-link" href="http://localhost:8080/CETI/Producto/vistas/Admin/Canciones/">Canciones</a>
                </div>
              </div>
            <?php endif; ?>
            <?php if($_SESSION['user']['role']): ?>
            <form class="d-flex">
              <a href="http://localhost:8080/CETI/Producto/controladores/<?php echo $_SESSION['user']['role'] == 'user' ? 'auth' : 'admin_auth'; ?>.php?logout=TRUE" class="btn btn-outline-success">Logout</a>
            </form>
            <?php endif; ?>
          </div>
        </nav>
