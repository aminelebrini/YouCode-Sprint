<?php

 namespace Controllers;

use Core\Controller;
use Models\User;
 class UserController extends Controller
 {
    private $service;

    public function __construct($service) {
        $this->service = $service;
    }
    public function get_profile($email = null, $password = null)
    {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        $user = $this->service->login($email, $password);

        if ($user) {
            $_SESSION['d'] = $user->getId();
            $_SESSION['role'] = $user->getRole();

            if ($user->getRole() === 'Admin') {
                header('Location: /admindash'); 
            }
            exit(); 
        } else {
            header('Location: /home');
        }
    }
    public function index()
    {
        $this->render('admindash', [
            'title' => 'admindash'
        ]);
    }
 }
?>