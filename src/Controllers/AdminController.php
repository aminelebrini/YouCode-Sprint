<?php

use Core\Controller;

class AdminController extends Controller{
    private $service;
    private $SprintService;

    public function __construct($service, $SprintService)
    {
        parent::__construct();
        $this->service = $service;
        $this->SprintService = $SprintService;
    }

    public function addSprint()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $titre = $_POST['titre'] ?? null;
            $dateDebut = $_POST['date_debut'] ?? null;
            $dateFin = $_POST['date_fin'] ?? null;

            if($this->SprintService->createSprint($titre, $dateDebut, $dateFin))
            {
                header('Location: /admindash');
                exit();
            } else {
                die("Erreur lors de l'ajout du sprint");
            }
            
        }
    }

}
?>