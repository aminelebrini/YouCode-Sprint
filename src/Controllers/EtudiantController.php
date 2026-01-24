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