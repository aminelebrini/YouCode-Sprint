<?php

namespace Controllers;
use Core\Controller;

class AdminController extends Controller{
    private $UserService;
    private $AdminService;
    

    public function __construct($services) {
        parent::__construct();
        $this->UserService = $services['user'];
        $this->AdminService = $services['admin'];
    }

    public function CreateUser()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $role = $_POST['role'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if($this->AdminService->CreateUser($nom, $prenom, $role,$email,$password))
            {
                header('Location: /admindash');
                exit();
            } else {
                die("Erreur lors de l'ajout du Compte");
            }
        }

    }
    public function addSprint()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $titre = $_POST['titre'] ?? null;
            $dateDebut = $_POST['date_debut'] ?? null;
            $dateFin = $_POST['date_fin'] ?? null;

            if($this->AdminService->createSprint($titre, $dateDebut, $dateFin))
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
            $capacity = $_POST['capacity'];
            $annescolaire = $_POST['annee_scolaire'];

            if($this->AdminService->CreateClasse($nom,$capacity,$annescolaire))
            {
                header('Location: /admindash');
                exit();
            } else {
                die("Erreur lors de l'ajout du classe");
            }
        }
    }

    public function assignation()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $ClasseId = $_POST['class_id'];
            $FormateurId = $_POST['teacher_id'];

            if(!$this->AdminService->AssignerFormateur($ClasseId,$FormateurId))
            {
                die("Erreur lors de l'ajout du fromateur");
                
            }
            header('Location: /admindash');
            exit();
        }
    }

    public function add_skill()
    {
        $ComperenceName = $_POST['competence_name'];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if(!$this->AdminService->addSkill($ComperenceName))
            {
                die("Erreur lors de l'ajout du Competence");
                
            }
            header('Location: /admindash');
            exit();
        }
    
    }


    public function index()
    {
        $sprints = $this->AdminService->get_Sprints() ?? [];
        $users = $this->UserService->getUsers() ?? [];
        $classes = $this->AdminService->get_Classes() ?? [];
        $competences = $this->AdminService->get_Competence() ?? [];

        $this->render('admindash', [
                'sprints' => $sprints,
                'users' => $users,
                'classes' => $classes,
                'competences' => $competences
            ]);
    }

}
?>