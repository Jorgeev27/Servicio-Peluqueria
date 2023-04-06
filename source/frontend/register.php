<?php
    declare(strict_types = 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../assets/img/logoPeluqueria.png" alt="logoPeluqueria" width="50" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./sobrenosotros.php">Sobre nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./noticias.php">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./productos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./galeria.php">Galería</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <h1 class="text-black text-center">Registro</h1>
            </div>
        </div>
    </div>
    <div class="container mt-4" style="display: flex; align-items: center; justify-content: center;">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <form>
                    <div class="mb-1">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre">
                    </div>
                    <div class="mb-2">
                        <label for="apellido1" class="form-label">Primer Apellido:</label>
                        <input type="text" class="form-control" id="apellido1">
                    </div>
                    <div class="mb-2">
                        <label for="apellido2" class="form-label">Segundo Apellido:</label>
                        <input type="text" class="form-control" id="apellido2">
                    </div>
                    <div class="mb-2">
                        <label for="dniUsuario" class="form-label">DNI:</label>
                        <input type="text" class="form-control" id="dniUsuario">
                    </div>
                    <div class="mb-2">
                        <label for="telefonoMovil" class="form-label">Teléfono móvil:</label>
                        <input type="text" class="form-control" id="telefonoMovil">
                    </div>
                    <div class="mb-2">
                        <label for="nombreUsuario" class="form-label">Nombre Usuario:</label>
                        <input type="text" class="form-control" id="nombreUsuario">
                    </div>
                    <div class="mb-2">
                        <label for="correoElectronico" class="form-label">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="correoElectronico">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe' crossorigin='anonymous'></script>
</body>
</html>