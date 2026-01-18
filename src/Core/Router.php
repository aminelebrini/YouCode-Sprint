<?php

namespace Core;
class Router{
    private $route = [];
    private $userService;

    public function __construct($userService) {
        $this->userService = $userService;
    }

    public function get($path, $controller, $role)
    {
        $this->route['GET'][$path][$role] = $controller; 
       //var_dump($this->route['GET'][$path][$role]);
    }

    public function post($path, $controller, $role) {

        $this->route['POST'][$path][$role] = $controller; 
    }

    public function generate_path()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $role = $_SESSION['role'] ?? 'visiteur';

        if (!isset($this->route[$method][$path][$role])) {
            http_response_code(404);
            die("Page introuvable (404)");
        }
        
        $action = $this->route[$method][$path][$role];
                
        list($controllerClass, $methodPart) = explode("@", $action);

        $fullClass = "\\" . $controllerClass;

        if (class_exists($fullClass)) {

        $controllerObj = new $fullClass($this->userService);
            $controllerObj->$methodPart();
        } else {
            die("Controller $fullClass malqynahch.");
        } 
    }
}
?>