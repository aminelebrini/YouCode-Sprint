<?php

use Core\Controller;

class AdminController extends Controller{
    private $service;

    public function __construct($service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function addSprint()
    {
        
    }

}
?>