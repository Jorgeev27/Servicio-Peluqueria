<?php
    /* Estos son encabezados HTTP que permiten compartir recursos de origen cruzado (CORS) para la API.
    Especifican qué orígenes pueden acceder a la API, qué métodos HTTP están permitidos, qué
    encabezados están permitidos en la solicitud y cuánto tiempo se puede almacenar en caché la
    solicitud de verificación previa. El encabezado `Access-Control-Allow-Origin: *` permite que
    cualquier origen acceda a la API, mientras que el encabezado `Access-Control-Allow-Credentials:
    true` permite incluir credenciales (como cookies) en la solicitud. Los otros encabezados
    proporcionan una configuración adicional para CORS. */
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
    header('Access-Control-Max-Age: 86400');
    header("Access-Control-Allow-Credentials: true");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        exit(0);
    }

    require_once "models/roles.php";

    $roles = new Roles();

    /* Este código maneja solicitudes HTTP para una API RESTful relacionada con roles. Utiliza una
    declaración de cambio para manejar diferentes métodos HTTP (GET, POST, PUT, DELETE) y realiza
    diferentes acciones basadas en el método. */
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if (isset($_GET['id'])) {
                echo json_encode($roles->getWhere($_GET['id']));
            } else {
                echo json_encode($roles->getAll());
            }
            break;
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != NULL) {
                if ($roles->insert($datos->rol)) {
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
        case 'PUT':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != NULL) {
                if ($roles->update($datos->id, $datos->rol)) {
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
                if ($roles->delete($_GET['id'])) {
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