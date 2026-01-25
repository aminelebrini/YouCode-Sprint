<?php

    namespace Controllers;

    use Core\Controller;
 class EtudiantController extends Controller
 {
    private $EtudiantService;

    public function __construct($services)
    {
        parent::__construct();
        $this->EtudiantService = $services['etudiant'];
    }

    public function soumettre_rendu()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $brief_id = $_POST['brief_id'];
            $etudiant_id = $_POST['etudiant_id'];
            $lien = $_POST['lien_rendu'];
            $commentaire = $_POST['commentaire'];

            if($this->EtudiantService->SoumettreRendu($brief_id,$etudiant_id,$lien,$commentaire))
            {
                die("Erreur lors de l'ajout du rendu");
                
            }
            header('Location: /etudiantdash');
            exit();
        }
    }
    public function index()
    {
        // $users = $this->UserService->getUsers() ?? [];
        $classes = $this->EtudiantService->get_Classes() ?? [];
        // $sprints = $this->FormateurService->get_Sprints() ?? [];
        // $competences = $this->FormateurService->get_Competence() ?? [];
        $briefs = $this->EtudiantService->get_Brief() ?? [];
        $etudiants = $this->EtudiantService->get_Etudiant() ?? [];

        $this->render('etudiantdash',[
            'titre' => 'YouCode Student',
            'briefs' => $briefs,
            'etudiants' => $etudiants,
            'classes' => $classes
        ]);
    }
 }

?>