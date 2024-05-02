<?php
include 'db_connection.php';
// $conn = $GLOBALS['conn'];
include "contactos.php";

// Recibir la solicitud
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $datos=json_decode(file_get_contents('php://input'),true);
        if (isset($datos['id']) && isset($datos['nombre'])) {
            $result = crearContacto($datos);
            echo json_encode($result);
        } else {
            http_response_code(405);
            echo 'Faltan datos para ejecutar el alta';
        }
        break;
    case 'GET':
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $result = leerContactoPorCodigo($_GET['id']);
            echo json_encode($result);
        } else {
             $result = leerContactos();
             echo json_encode($result);
        }
        break;
    case 'PUT':
        $datos=json_decode(file_get_contents('php://input'),true);
        if (isset($datos['id']) && is_numeric($datos['id'])) {
            $result = grabarCambiosContacto($datos);
            echo json_encode($result);
        } else {
            http_response_code(405);
            echo 'Faltan datos para ejecutar las modificaciones';
        }
        break;
    case 'DELETE':
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $result = eliminarContacto($_GET['id']);
            echo json_encode($result);
        } else {
            http_response_code(405);
            echo 'Faltan datos para eliminar el contacto';
        }
        break;
    default:
        http_response_code(405);
        echo 'Método HTTP no permitido';
        break;
}
?>