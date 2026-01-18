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
    public function get_profile($email,$password)
    {
        $email = $_POST['email'];
        $password  = $_POST['password'];

        $user = $this->service->login($email, $password);

        if ($user) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['role'] = $user->role;

            if ($user->role === 'Admin') {
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