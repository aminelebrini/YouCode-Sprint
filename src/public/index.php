<?php

session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;
use Core\Data;
use Repository\UserRepository;
use Repository\SprintRepository;
use Services\UserService;
use Services\SprintService;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$db = Data::getInstance()->connection();

$userRepo = new UserRepository($db);
$sprintRepo = new SprintRepository($db);

$userService = new UserService($userRepo);
$sprintService = new SprintService($sprintRepo); 

$router = new Router([
    'user' => $userService,
    'sprint' => $sprintService
]);


$router->get('/', 'Controllers\\HomeController@index', 'Visiteur');
$router->get('/admindash', 'Controllers\\UserController@index', 'Admin');

$router->post('/get_profile', 'Controllers\\UserController@get_profile', 'Visiteur');
$router->post('/logout', 'Controllers\\UserController@logout', 'Admin');
$router->post('/logout', 'Controllers\\UserController@logout', 'Student');
$router->post('/logout', 'Controllers\\UserController@logout', 'Formateur');
$router->post('/addSprint', 'Controllers\\AdminController@addSprint', 'Admin');

$router->generate_path();