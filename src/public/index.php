<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Core/Router.php';


use Core\Router;

$router = new Router();

$router->get('/', 'Controllers\\HomeController@index', 'visiteur');

$router->generate_path();
