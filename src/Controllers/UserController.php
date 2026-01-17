<?php

 namespace Controllers;
 
 class UserController
 {
    private $service;

    public function __construct($service) {
        $this->service = $service;
    }
    public function get_profile($email,$password)
    {
        return $this->service->login($email, $password);
    }
 }
?>