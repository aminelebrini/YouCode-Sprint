<?php

namespace Controllers;
use Core\Controller;

class AdminController extends Controller{
    private $SprintService;
    private $UserService;

    public function __construct($services) {
        parent::__construct();
        $this->SprintService = $services['sprint'];
        $this->UserService = $services['user'];
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

    public function index()
    {
        $sprints = $this->SprintService->get_Sprints() ?? [];
        $users = $this->UserService->getUsers() ?? [];
        $this->render('admindash', [
                'sprints' => $sprints,
                'users' => $users
            ]);
    }

}
?>