<?php
namespace Controllers;
use Core\Controller;
class FormateurController extends Controller
{
    private $UserService;
    private $FormateurService;

    public function __construct($services) {
        parent::__construct();
        $this->UserService = $services['user'];
        $this->FormateurService = $services['formateur'];
    }

    public function creer_brief()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')    
        {
            $Titre = $_POST['titre'] ?? [];
            $DateDebut = $_POST['date_debut'] ?? [];
            $DateFin = $_POST['date_fin'] ?? [];
            $SprintId = $_POST['sprint_id'] ?? [];
            $type = $_POST['type'] ?? [];
            $CompetenceId = $_POST['competence_ids'];
            $Description = $_POST['description'];

            if($this->FormateurService->CreateBrief($Titre,$DateDebut,$DateFin,$SprintId,$type,$CompetenceId,$Description))
            {
                header('Location: /formateurdash');
                exit();
            } else {
                die("Erreur lors de l'ajout du Brief");
            }
        }
    }
    public function index()
    {
        $users = $this->UserService->getUsers() ?? [];
        $classes = $this->FormateurService->get_Classes() ?? [];
        $sprints = $this->FormateurService->get_Sprints() ?? [];
        $competences = $this->FormateurService->get_Competence() ?? [];
        $briefs = $this->FormateurService->get_Brief() ?? [];

        $this->render('formateurdash',[
            'title' => 'Formateur Dashboard',
            'users' => $users,
            'classes' => $classes,
            'sprints' => $sprints,
            'competences' => $competences,
            'briefs' => $briefs
        ]);
    }
}
?>