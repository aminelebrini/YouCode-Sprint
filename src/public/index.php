<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;
use Core\Data;
use Repository\UserRepository;
use Services\UserService;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$db = Data::getInstance()->connection();

$userRepo = new UserRepository($db);
$userService = new UserService($userRepo);

$router = new Router($userService);

$router->get('/', 'Controllers\\HomeController@index', 'visiteur');
$router->get('/admindash', 'Controllers\\UserController@index', 'admin');

$router->post('/get_profile', 'Controllers\\UserController@get_profile', 'visiteur');

$router->generate_path();