<?php
    require_once("../../frontend/index.php");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $nombre = $_POST['nombre'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $dniUsuario = $_POST['dniUsuario'];
        $telefonoMovil = $_POST['telefonoMovil'];
        $nombreUsuario = $_POST['nombreUsuario'];
        $correoElectronico = $_POST['correoElectronico'];
        echo 'Registro exitoso!';
    } else {
        echo "ERROR!!";
    }
?>