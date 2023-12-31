<?php

/**
  * Open a connection via PDO to create a
  * new database and table with structure.
  *
  */

require "config_db.php";

try {
  $connection = new PDO("mysql:host=$host", $username, $password, $options);
  $sql = file_get_contents("sql/init.sql");
  $connection->exec($sql);

  echo "La base de datos y las tablas se han creado con éxito.";
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}