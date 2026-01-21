<?php

session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;
use Core\Data;
use Repository\UserRepository;
use Repository\AdminRepository;

use Services\UserService;
use Services\AdminService;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$db = Data::getInstance()->connection();

$userRepo = new UserRepository($db);
$adminRepo = new AdminRepository($db);

$userService = new UserService($userRepo);
$adminService = new AdminService($adminRepo);

$router = new Router([
    'user' => $userService,
    'admin' => $adminService,
]);


$router->get('/', 'Controllers\\HomeController@index', 'Visiteur');
$router->get('/admindash', 'Controllers\\UserController@index', 'Admin');
$router->get('/admindash', 'Controllers\\AdminController@index', 'Admin');


$router->post('/get_profile', 'Controllers\\UserController@get_profile', 'Visiteur');
$router->post('/logout', 'Controllers\\UserController@logout', 'Admin');
$router->post('/logout', 'Controllers\\UserController@logout', 'Student');
$router->post('/logout', 'Controllers\\UserController@logout', 'Formateur');
$router->post('/CreateUser', 'Controllers\\AdminController@CreateUser', 'Admin');
$router->post('/addSprint', 'Controllers\\AdminController@addSprint', 'Admin');
$router->post('/add_class', 'Controllers\\AdminController@add_class','Admin');



$router->generate_path();