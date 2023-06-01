<?php
    /* Estos son encabezados HTTP que permiten compartir recursos de origen cruzado (CORS) para el
    servidor web. Especifican qué orígenes pueden acceder a los recursos en el servidor, qué métodos
    HTTP están permitidos, qué encabezados están permitidos en la solicitud y cuánto tiempo se puede
    almacenar en caché la solicitud de verificación previa. El encabezado
    `Access-Control-Allow-Origin: *` permite que cualquier origen acceda a los recursos, mientras
    que el encabezado `Access-Control-Allow-Credentials: true` permite incluir credenciales en la
    solicitud. Estos encabezados son necesarios cuando se realizan solicitudes AJAX desde un dominio
    o puerto diferente al que sirve a la página web. */
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
    header('Access-Control-Max-Age: 86400');
    header("Access-Control-Allow-Credentials: true");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        exit(0);
    }

    require_once "models/tipocorte.php";

    $tipo = new Tipocorte();

    /* Este es un script PHP que maneja solicitudes HTTP para una API REST relacionada con cortes de
    cabello. Utiliza una declaración de cambio para manejar diferentes métodos HTTP (GET, POST, PUT,
    DELETE) y realiza diferentes acciones según el método y los datos recibidos. */
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if (isset($_GET['nombre'])) {
                $nombreTipoCorte = $_GET['nombre'];
                if ($nombreTipoCorte) {
                    echo json_encode($tipo->getWhere($nombreTipoCorte));
                } else {
                    http_response_code(401);
                    echo json_encode(array("mensaje" => "Credenciales inválidas"));
                }
            } else {
                echo json_encode($tipo->getAll());
            }
            break;
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != NULL) {
                // Primero verificamos si el usuario ya existe en la base de datos
                $tipo_existente = $tipo->existeTipoCorte($datos->nombre);
                if ($tipo_existente) {
                    // Si el usuario ya existe, devolvemos un error
                    http_response_code(409);
                    echo json_encode(array("mensaje" => "El tipo de corte de pelo ya existe en la base de datos"));
                } else {
                    $nombreTipoCorte = $datos->nombre;
                    // Si el usuario no existe, insertamos los datos en la base de datos
                    if ($tipo->insert($nombreTipoCorte)) {
                        http_response_code(200);
                    } else {
                        http_response_code(500);
                        echo json_encode(array("mensaje" => "No se pudo insertar el tipo de corte de pelo en la base de datos"));
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
                $id_tipo_corte= $datos->id_tipo_corte;
                $nombreTipoCorte = $datos->nombre;
                if ($tipo->update($id_tipo_corte, $nombreTipoCorte)) {
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
            if (isset($_GET['id_tipo_corte'])) {
                if ($tipo->delete($_GET['id_tipo_corte'])) {
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