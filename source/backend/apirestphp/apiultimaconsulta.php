<?php
    /* Estos son encabezados HTTP que permiten compartir recursos de origen cruzado (CORS) para la API.
    Especifican qué orígenes, métodos, encabezados y credenciales pueden acceder a la API. */
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
    header('Access-Control-Max-Age: 86400');
    header("Access-Control-Allow-Credentials: true");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        exit(0);
    }

    require_once "models/ultimaconsulta.php";

    $ultima = new UltimaConsulta();

    /* Este código maneja solicitudes HTTP para una API de PHP. Está utilizando una declaración de
    cambio para verificar el método de solicitud (GET, POST, PUT, DELETE, OPTIONS) y luego ejecuta
    un código diferente según el método. */
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if ($id) {
                    echo json_encode($ultima->getWhere($id));
                } else {
                    http_response_code(401);
                    echo json_encode(array("mensaje" => "Credenciales inválidas"));
                }
            } else {
                echo json_encode($ultima->ultimoInsert());
            }
            break;
        default:
            http_response_code(405);
            break;
    }//end while
?>