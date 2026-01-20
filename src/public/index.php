<?php

session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;
use Core\Data;
use Repository\UserRepository;
use Repository\SprintRepository;
use Repository\ClasseRepository;
use Services\UserService;
use Services\SprintService;
use Services\ClasseService;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$db = Data::getInstance()->connection();

$userRepo = new UserRepository($db);
$sprintRepo = new SprintRepository($db);
$classeRepo = new ClasseRepository($db);

$userService = new UserService($userRepo);
$sprintService = new SprintService($sprintRepo); 
$classeService = new ClasseService($classeRepo);

$router = new Router([
    'user' => $userService,
    'sprint' => $sprintService,
    'classe' => $classeService
]);


$router->get('/', 'Controllers\\HomeController@index', 'Visiteur');
$router->get('/admindash', 'Controllers\\UserController@index', 'Admin');
$router->get('/admindash', 'Controllers\\AdminController@index', 'Admin');

$router->post('/get_profile', 'Controllers\\UserController@get_profile', 'Visiteur');
$router->post('/logout', 'Controllers\\UserController@logout', 'Admin');
$router->post('/logout', 'Controllers\\UserController@logout', 'Student');
$router->post('/logout', 'Controllers\\UserController@logout', 'Formateur');
$router->post('/addUsers', 'Controllers\\AdminController@addUsers', 'Admin');
$router->post('/addSprint', 'Controllers\\AdminController@addSprint', 'Admin');
$router->post('/add_class', 'Controllers\\AdminController@add_class','Admin');



$router->generate_path();