<?php
include('../functions.php');
// Verifica si el parámetro "id" está presente en la URL
if (isset($_GET['id'])) {
    // Obtén el valor del parámetro "id"
    $id = $_GET['id'];

    // Aquí puedes procesar el valor de $id según las necesidades de tu aplicación
    // Por ejemplo, realizar una consulta en la base de datos y devolver el resultado

    // En este ejemplo, simplemente devuelvo el valor del parámetro "id"
    echo json_encode(getResource($id));
} else {
    // Si el parámetro "id" no está presente, retorna un mensaje de error
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(array('error' => 'Parámetro "id" no proporcionado'));
}



