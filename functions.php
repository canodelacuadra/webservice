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

?>