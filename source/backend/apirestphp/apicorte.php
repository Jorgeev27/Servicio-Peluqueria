<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
    header('Access-Control-Max-Age: 86400');
    header("Access-Control-Allow-Credentials: true");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        exit(0);
    }
    require_once "models/corte.php";

    $corte = new Corte();

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if (isset($_GET['identificador'])) {
                $identificador = $_GET['identificador'];
                /* $usuario = $usuarios->verificarUsuario($contrasena, $correoUsuario); */
                if ($corte) {
                    echo json_encode($corte->getWhere($identificador));
                } else {
                    http_response_code(401);
                    echo json_encode(array("mensaje" => "Credenciales inválidas"));
                }
            } else {
                echo json_encode($corte->getAll());
            }
            break;
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != NULL) {
                // Primero verificamos si la mascota ya existe en la base de datos
                $corte_existente = $mascotas->existeCorte($datos->identificador);
                if ($corte_existente) {
                    // Si la mascota ya existe, devolvemos un error
                    http_response_code(409);
                    echo json_encode(array("mensaje" => "El corte de pelo ya existe en la base de datos"));
                } else {
                    $nombre = $datos->nombre;
                    $descripcion = $datos->descripcion;
                    $precio = $datos->precio;
                    $id_tipo_corte = $datos->id_tipo_corte;
                    if ($corte->insert($nombre, $descripcion, $precio, $id_tipo_corte)) {
                        http_response_code(200);
                    } else {
                        http_response_code(500);
                        echo json_encode(array("mensaje" => "No se pudo insertar el corte de pelo en la base de datos"));
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
                $id_corte = $datos->id_corte;
                $nombre = $datos->nombre;
                $descripcion = $datos->descripcion;
                $precio = $datos->precio;
                $id_tipo_corte = $datos->id_tipo_corte;
                if ($corte->update($id_corte, $nombre, $descripcion, $precio, $id_tipo_corte)) {
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
            if (isset($_GET['id_corte'])) {
                if ($corte->delete($_GET['id_corte'])) {
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