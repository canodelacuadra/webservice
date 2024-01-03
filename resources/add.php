<?php
require('../functions.php');
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

// Procesa los datos como desees
// En este ejemplo, simplemente imprimiré los datos recibidos
echo json_encode(insertResource($data));
