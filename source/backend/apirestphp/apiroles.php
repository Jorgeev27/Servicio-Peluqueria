<?php
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