<?php

session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;
use Core\Data;
use Repository\UserRepository;
use Repository\AdminRepository;
use Repository\FormateurRepository;

use Services\UserService;
use Services\AdminService;
USE Services\FormateurService;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$db = Data::getInstance()->connection();

$userRepo = new UserRepository($db);
$adminRepo = new AdminRepository($db);
$formateurRepo = new FormateurRepository($db);

$userService = new UserService($userRepo);
$adminService = new AdminService($adminRepo);
$formateurService = new FormateurService($formateurRepo);

$router = new Router([
    'user' => $userService,
    'admin' => $adminService,
    'formateur' => $formateurService,
]);


$router->get('/', 'Controllers\\HomeController@index', 'Visiteur');
$router->get('/admindash', 'Controllers\\UserController@index', 'Admin');
$router->get('/admindash', 'Controllers\\AdminController@index', 'Admin');
$router->get('/formateurdash', 'Controllers\\FormateurController@index', 'Formateur');
$router->get('/etudiantdash', 'Controllers\\EtudiantController@index', 'Etudiant');

$router->post('/get_profile', 'Controllers\\UserController@get_profile', 'Visiteur');
$router->post('/logout', 'Controllers\\UserController@logout', 'Admin');
$router->post('/logout', 'Controllers\\UserController@logout', 'Student');
$router->post('/logout', 'Controllers\\UserController@logout', 'Formateur');
$router->post('/CreateUser', 'Controllers\\AdminController@CreateUser', 'Admin');
$router->post('/addSprint', 'Controllers\\AdminController@addSprint', 'Admin');
$router->post('/add_class', 'Controllers\\AdminController@add_class','Admin');
$router->post('/assignation','Controllers\\AdminController@assignation', 'Admin');
$router->post('/add_skill','Controllers\\AdminController@add_skill', 'Admin');
$router->post('/creer_brief', 'Controllers\\FormateurController@creer_brief', 'Formateur');
$router->post('/assign_students', 'Controllers\\FormateurController@assign_students', 'Formateur');



$router->generate_path();