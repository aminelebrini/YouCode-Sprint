<?php

namespace Core;
class Router{
    private $route = [];

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

        echo $method;

        if(!isset($role)) {
            require_once __DIR__ . "/../views/404.blade.php";
            return;
        }
        $action = $this->route[$method][$path][$role];
                
        list($controllerClass, $methodPart) = explode("@", $action);

        $fullClass = "\\" . $controllerClass;

        $controllerObj = new $fullClass();
        $controllerObj->$methodPart();  
    }
}
?>