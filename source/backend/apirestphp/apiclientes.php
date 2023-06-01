<?php
    /* Estos encabezados configuran el uso compartido de recursos de origen cruzado (CORS) para la API.
    CORS es una función de seguridad implementada por los navegadores web que impide que las páginas
    web realicen solicitudes a un dominio diferente al que sirve la página web. Al establecer estos
    encabezados, la API permite solicitudes de cualquier dominio, especificando los métodos HTTP
    permitidos (GET, POST, PUT, DELETE, OPTIONS), encabezados permitidos (Content-Type,
    Access-Control-Allow-Headers, Authorization, X- Requested-With) y el tiempo máximo (en segundos)
    que el navegador debe almacenar en caché la respuesta de verificación previa. El último
    encabezado, "Access-Control-Allow-Credentials", permite que la API reciba y envíe cookies en
    solicitudes de origen cruzado. */
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

    /* Este código implementa una API RESTful para administrar clientes. Utiliza los métodos HTTP GET,
    POST, PUT y DELETE para recuperar, crear, actualizar y eliminar los datos del cliente,
    respectivamente. El código primero configura los encabezados necesarios para CORS (intercambio
    de recursos de origen cruzado) y luego verifica el método HTTP utilizado en la solicitud. Según
    el método, realiza la acción correspondiente sobre los datos del cliente utilizando los métodos
    definidos en el modelo "cliente.php". Por ejemplo, si el método es GET, recupera todos los
    clientes o un cliente específico si se proporciona una ID. Si el método es POST, crea un nuevo
    cliente si los datos proporcionados son válidos y el cliente aún no existe. Si el método es PUT,
    actualiza un cliente existente con los datos proporcionados. Si el método es DELETE, elimina un
    cliente existente con la ID proporcionada. Si no se reconoce el método, devuelve un error 405. */
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