<?php

function getResources()
{
    // Conexión a la base de datos
    $db = new PDO("mysql:host=localhost;dbname=recursos_multimedia", "root", "" );

    // Consulta a la base de datos
    $query = "SELECT * FROM recursos_multimedia";
    $result = $db->query($query);

    // Obtenemos  los resultados y almacenamos en una variable

    $resources = $result->fetchAll();

    // Servimos los recursos al cliente
    return $resources;
  
}

function getResource($id)
{
     // Conexión a la base de datos
    $db = new PDO("mysql:host=localhost;dbname=recursos_multimedia", "root", "");

    // Consulta a la base de datos
    $query = "SELECT * FROM recursos_multimedia WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindParam(":id", $id);
    $statement->execute();

    // Obtenemos el recurso
    $resource = $statement->fetch();
// Servimos el recurso al cliente
    return $resource;
   
}
function insertResource($jsonData)
{
    // Conexión a la base de datos
    $db = new PDO("mysql:host=localhost;dbname=recursos_multimedia", "root", "");

    // Datos del JSON
    $nombre = $jsonData['nombre'];
    $tipo = $jsonData['tipo'];
    $ruta = $jsonData['ruta'];

    // Consulta para insertar un nuevo recurso
    $query = "INSERT INTO recursos_multimedia (nombre, tipo, ruta) VALUES (:nombre, :tipo, :ruta)";
    $statement = $db->prepare($query);

    // Bind de parámetros
    $statement->bindParam(':nombre', $nombre);
    $statement->bindParam(':tipo', $tipo);
    $statement->bindParam(':ruta', $ruta);

    // Ejecutar la consulta
    $result = $statement->execute();

    // Verificar si la inserción fue exitosa
    if ($result) {
        return "Recurso insertado con éxito";
    } else {
        return "Error al insertar el recurso";
    }
}
function updateResource($jsonData)
{
    // Conexión a la base de datos
    $db = new PDO("mysql:host=localhost;dbname=recursos_multimedia", "root", "");

    // Datos del JSON
    $id = $jsonData['id'];
    $nombre = $jsonData['nombre'];
    $tipo = $jsonData['tipo'];
    $ruta = $jsonData['ruta'];

    // Consulta para actualizar un recurso
    $query = "UPDATE recursos_multimedia SET nombre = :nombre, tipo = :tipo, ruta = :ruta WHERE id = :id";
    $statement = $db->prepare($query);

    // Bind de parámetros
    $statement->bindParam(':id', $id);
    $statement->bindParam(':nombre', $nombre);
    $statement->bindParam(':tipo', $tipo);
    $statement->bindParam(':ruta', $ruta);

    // Ejecutar la consulta
    $result = $statement->execute();

    // Verificar si la actualización fue exitosa
    if ($result) {
        return "Recurso actualizado con éxito";
    } else {
        return "Error al actualizar el recurso";
    }
}
function deleteResource($resourceId)
{
    // Conexión a la base de datos
    $db = new PDO("mysql:host=localhost;dbname=recursos_multimedia", "root", "");

    // Consulta para eliminar un recurso
    $query = "DELETE FROM recursos_multimedia WHERE id = :id";
    $statement = $db->prepare($query);

    // Bind de parámetros
    $statement->bindParam(':id', $resourceId);

    // Ejecutar la consulta
    $result = $statement->execute();

    // Verificar si la eliminación fue exitosa
    if ($result) {
        return "Recurso eliminado con éxito";
    } else {
        return "Error al eliminar el recurso";
    }
}

?>