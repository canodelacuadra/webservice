<?php
$data=file_get_contents('webservice.json');
$data= json_decode($data);
header('Content-Type: application/json');
echo  json_encode($data);
