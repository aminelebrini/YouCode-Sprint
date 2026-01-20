<?php

namespace Controllers;
use Core\Controller;

class AdminController extends Controller{
    private $SprintService;
    private $UserService;
    private $ClasseService;
    

    public function __construct($services) {
        parent::__construct();
        $this->SprintService = $services['sprint'];
        $this->UserService = $services['user'];
        $this->ClasseService = $services['classe'];
    }

    public function addUsers()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $role = $_POST['role'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if($this)
        }

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

    public function add_class()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $nom = $_POST['class_name'];
            $teacher = $_POST['teacher_id'];
            $capacity = $_POST['capacity'];
            $annescolaire = $_POST['annee_scolaire'];

            if($this->ClasseService->CreateClasse($nom, $teacher,$capacity,$annescolaire))
            {
                header('Location: /admindash');
                exit();
            } else {
                die("Erreur lors de l'ajout du classe");
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