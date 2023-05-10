<?php
    declare(strict_types = 1);
    require("../backend/config/config.php");
    require_once("../backend/model/BasePDOConnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServicioPeluqueria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logoPeluqueria.png" alt="logoPeluqueria" width="50" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./sobreNosotros.php">Sobre nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./noticias.php">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./Producto.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./galeria.php">Galería</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./contacto.php">Contacto</a>
                    </li>
                </ul>
                <form class="d-flex mx-2">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Iniciar Sesión/Regístrate</button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="mx-auto">
                                        <button type="button" class="btn btn-primary" id="login-link">Iniciar Sesión</button>
                                        <button type="button" class="btn btn-primary mx-4" id="register-link">Registrarse</button>
                                    </div>
                                    <button type="button" class="btn-close mx-0" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="modalBody">
                                    <div id="login-container">
                                        <div id="login">
                                            <h3 class="text-center">Inicio de sesión</h3>
                                            <form action="" method="post" enctype="multipart/form-data" id="loginForm">
                                                    <label for="user" class="form">Nombre de usuario:</label>
                                                    <input type="text" class="form" id="user" name="user" required="required">
                                                    <br/><br/>
                                                    <label for="password" class="form">Contraseña:</label>
                                                    <input type="password" class="form" id="password" name="password" required="required">
                                                    <br/><br/>
                                                <button type="submit" id="entrar" name="entrar" class="btn btn-success w-100">Entrar</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!--REGISTRO-->
                                    <div id="register-container">
                                        <div id="register">
                                            <h3 class="text-center">Registro de usuario</h3>
                                            <form method="post" enctype="multipart/form-data" id="registerform" class="d-grid justify-content-center">
                                                <label for="nombre" class="form">Nombre:</label>
                                                <input type="text" class="form" id="nombre" required="required">
                                                <br/>
                                                <label for="apellido1" class="form">Primer Apellido:</label>
                                                <input type="text" class="form" id="apellido1" required="required">
                                                <br/>
                                                <label for="apellido2" class="form">Segundo Apellido:</label>
                                                <input type="text" class="form" id="apellido2" required="required">
                                                <br/>
                                                <label for="dniUsuario" class="form">DNI:</label>
                                                <input type="text" class="form" id="dniUsuario" required="required">
                                                <br/>
                                                <label for="telefonoMovil" class="form">Teléfono móvil:</label>
                                                <input type="text" class="form" id="telefonoMovil" required="required">
                                                <br/>
                                                <label for="nombreUsuario" class="form">Nombre Usuario:</label>
                                                <input type="text" class="form" id="nombreUsuario" required="required">
                                                <br/>
                                                <label for="correoElectronico" class="form">Correo Electrónico:</label>
                                                <input type="email" class="form" id="correoElectronico" required="required">
                                                <button type="submit" class="btn btn-success mt-4" title="registrar" name="registrar" id="registrar">Registrarse</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <main>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="assets/js/index.js"></script>
</body>
</html>
