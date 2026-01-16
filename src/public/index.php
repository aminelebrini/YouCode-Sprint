<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Core/Router.php';
use Core\Router;
use Core\Data;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$router = new Router();

$router->get('/', 'Controllers\\HomeController@index', 'visiteur');

$router->generate_path();




