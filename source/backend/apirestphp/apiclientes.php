<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
    header('Access-Control-Max-Age: 86400');
    header("Access-Control-Allow-Credentials: true");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        exit(0);
    }

    require_once "models/cliente.php";

    $clientes = new Cliente();

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if (isset($_GET['id'])) {
                echo json_encode($clientes->getWhere($_GET['id']));
            } else {
                echo json_encode($clientes->getAll());
            }
            break;
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos) {
                // Primero verificamos si el cliente ya existe en la base de datos
                $cliente_existente = $clientes->existeCliente($datos->dni);
                if ($cliente_existente) {
                    // Si el cliente ya existe, devolvemos un error
                    http_response_code(409);
                    echo json_encode(array("mensaje" => "El cliente ya existe en la base de datos"));
                } else {
                    $nombre = $datos->nombre;
                    $apellido = $datos->apellido;
                    $dni = $datos->dni;
                    $email = $datos->email;
                    $movil = $datos->movil;
                    if ($clientes->insert($nombre, $apellido, $dni, $email, $movil)) {
                        http_response_code(200);
                    } else {
                        http_response_code(500);
                        echo json_encode(array("mensaje" => "No se pudo insertar el cliente en la base de datos"));
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
                $id = $datos->id;
                $nombre = $datos->nombre;
                $apellido = $datos->apellido;
                $dni = $datos->dni;
                $email = $datos->email;
                $movil = $datos->movil;
                if ($clientes->update($id, $nombre, $apellido, $dni, $email, $movil)) {
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
                if ($clientes->delete($_GET['id'])) {
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
    }//end while
?>