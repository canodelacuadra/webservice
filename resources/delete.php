<?php
require_once('../functions.php');
// Obtén el contenido del cuerpo de la solicitud
$json_data = file_get_contents('php://input');

// Decodifica el JSON a un array asociativo
$data = json_decode($json_data, true);

// Verifica si la decodificación fue exitosa
if ($data === null) {
    // Maneja el error de JSON inválido
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(array('error' => 'JSON inválido'));
    exit;
}

// Aquí procesarías la eliminación en la base de datos según la estructura de tu aplicación


// Aquí procesarías la eliminación en la base de datos según la estructura de tu aplicación
$id = $data['id'];
$result= deleteResource($id);

// Retorna una respuesta indicando que la eliminación fue exitosa
echo json_encode($result);
?>