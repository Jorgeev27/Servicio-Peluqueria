<?php
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

    switch ($_SERVER['REQUEST_METHOD']) {
        /* case 'GET':
            if (isset($_GET['email'])) {
                echo json_encode($usuarios->getWhere($_GET['email']));
            } else {
                echo json_encode($usuarios->getAll());
            }
            break; 
        */
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
    /*  case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != NULL) {
                $nombre = $datos->nombre;
                $apellido = $datos->apellido;
                $movil = $datos->movil;
                $dni = $datos->dni;
                $email = $datos->email;
                $id_rol = $datos->id_rol;
                $pass = $datos->pass;
                // Encriptar la contraseña antes de insertarla
                $pass_encriptado = password_hash($pass, PASSWORD_DEFAULT);
                if ($usuarios->insert($nombre, $apellido, $movil, $dni, $email, $id_rol, $pass_encriptado)) {
                    http_response_code(200);
                } else {
                    http_response_code(400);
                }
            } else {
                http_response_code(405);
        }
        break; 
        */
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