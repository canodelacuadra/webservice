<?php

class Router {
    private $routes = [];

    // Método para agregar rutas al enrutador
    public function addRoute($route, $callback) {
        $this->routes[$route] = $callback;
    }

    // Método para manejar la solicitud y ejecutar la función asociada a la ruta
    public function handleRequest() {
        $path = $_SERVER['REQUEST_URI'];
        $path = parse_url($path, PHP_URL_PATH);

        foreach ($this->routes as $route => $callback) {
            $pattern = '/^' . str_replace('/', '\/', $route) . '$/';

            if (preg_match($pattern, $path, $matches)) {
                array_shift($matches); // Eliminar la coincidencia completa
                call_user_func_array($callback, $matches);
                return;
            }
        }

        // Ruta no encontrada
        echo '404 Not Found';
    }
}
