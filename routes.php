<?php
require_once('class/Router.php');
require_once('functions.php');
// Crear una instancia del enrutador
$router = new Router();

// Definir rutas y funciones asociadas
$router->addRoute('/webservice/', function () {
    $data = [
    'saludos' => 'Bienvenidos',
    'name' => 'Webservice Recursos Multimedia PN',
    'autores' => 'Tandem Patrimonio Nacional Aranjuez',
    'urls' => [
        'lista de recursos'=>'/resources',
        'un recurso'=>'/resources/id/1'
    ]
    ];
    echo json_encode($data);      
});
$router->addRoute('/webservice/about', function () {
   header('Location: pages/about.php');
});
$router->addRoute('/webservice/resources/', function () {

   header('Content-Type: application/json');
   echo json_encode(getResources());
});

$router->addRoute('/webservice/resources/id/(\d+)', function ($id) {
    //echo 'Mostrar recurso con ID: ' . $id;
    $resource= getResource($id);
    echo json_encode($resource);
});
$router->addRoute('/http://localhost/webservice/resources/add', function () {
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = $data['nombre'];
    echo $nombre;
});


// Manejar la solicitud
$router->handleRequest();