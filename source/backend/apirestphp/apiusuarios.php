<?php
    /* Estos encabezados se utilizan para habilitar el uso compartido de recursos de origen cruzado
    (CORS) para la API. CORS es una función de seguridad implementada por los navegadores web para
    evitar que las páginas web realicen solicitudes a un dominio diferente al que sirve la página
    web. Al configurar estos encabezados, la API permite solicitudes de cualquier dominio,
    especifica los métodos HTTP permitidos (GET, POST, PUT, DELETE, OPTIONS), establece los
    encabezados permitidos y establece la antigüedad máxima de la memoria caché de solicitud de
    verificación previa. El encabezado "Access-Control-Allow-Credentials" se utiliza para permitir
    que se envíen cookies con la solicitud. */
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
    header('Access-Control-Max-Age: 86400');
    header("Access-Control-Allow-Credentials: true");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        exit(0);
    }

    require_once "models/usuarios.php";

    $usuarios = new Usuarios();

    /* Este código implementa una API RESTful para administrar los datos del usuario. Utiliza el método
    de solicitud HTTP para determinar la acción a realizar. */
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if (isset($_GET['email'])) {
                $correoUsuario = $_GET['email'];
                $contrasena = $_GET['pass'];
                $usuario = $usuarios->verificarUsuario($contrasena, $correoUsuario);
                if ($usuario) {
                    echo json_encode($usuarios->getWhere($correoUsuario));
                } else {
                    http_response_code(401);
                    echo json_encode(array("mensaje" => "Credenciales inválidas"));
                }
            } else {
                echo json_encode($usuarios->getAll());
            }
            break;
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != NULL) {
                // Primero verificamos si el usuario ya existe en la base de datos
                $usuario_existente = $usuarios->existeUsuario($datos->dni);
                if ($usuario_existente) {
                    // Si el usuario ya existe, devolvemos un error
                    http_response_code(409);
                    echo json_encode(array("mensaje" => "El usuario ya existe en la base de datos"));
                } else {
                    $nombre = $datos->nombre;
                    $apellido = $datos->apellido;
                    $dni = $datos->dni;
                    $email = $datos->email;
                    $movil = $datos->movil;
                    $id_rol = $datos->id_rol;
                    $pass = $datos->pass;
                    // Si el usuario no existe, insertamos los datos en la base de datos
                    $pass_encriptado = password_hash($pass, PASSWORD_DEFAULT);
                    if ($usuarios->insert($nombre, $apellido, $dni, $email, $movil, $id_rol, $pass_encriptado)) {
                        http_response_code(200);
                    } else {
                        http_response_code(500);
                        echo json_encode(array("mensaje" => "No se pudo insertar el usuario en la base de datos"));
                    }
                }
            } else {
                http_response_code(400);
                echo json_encode(array("mensaje" => "Los datos enviados no son válidos"));
            }
            break;
        case 'PUT':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != NULL) {
                $id=$datos->id;
                $nombre = $datos->nombre;
                $apellido = $datos->apellido;
                $dni = $datos->dni;
                $email = $datos->email;
                $movil = $datos->movil;
                $id_rol = $datos->id_rol;
                if($usuarios->update($id,$nombre, $apellido, $dni, $email, $movil, $id_rol)) {
                    http_response_code(200);
                } //end if
                else {
                    http_response_code(400);
                } //end else
            } //end if
            else {
                http_response_code(405);
            } //end else
            break;
        case 'DELETE':
            if (isset($_GET['id'])) {
                if ($usuarios->delete($_GET['id'])) {
                    http_response_code(200);
                } //end if
                else {
                    http_response_code(400);
                } //end else
            } //end if 
            else {
                http_response_code(405);
            } //end else
            break;
        default:
            http_response_code(405);
            break;
    }//end while
?>