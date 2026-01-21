<?php
    namespace Services;

use Repository\AdminRepository;

    class AdminService
    {
        private $AdminRepository;

        public function __construct($AdminRepository)
        {
            $this->AdminRepository = $AdminRepository;
        }
        public function CreateUser($nom, $prenom, $role,$email,$password)
        {
            return $this->AdminRepository->create_users($nom, $prenom, $role,$email,$password);
        }
        public function CreateClasse($nom,$capacity,$annescolaire)
        {
            return $this->AdminRepository->Create_Classe($nom,$capacity,$annescolaire);
        }
        public function createSprint($titre, $dateDebut, $dateFin)
        {
            return $this->AdminRepository->addSprint($titre, $dateDebut, $dateFin);
        }
        public function AssignerFormateur($ClasseId,$FormateurId)
        {
            return $this->AdminRepository->Assigne($ClasseId,$FormateurId);
        }
        public function addSkill($ComperenceName)
        {
            return $this->AdminRepository->add_Skill($ComperenceName);
        }
        public function get_Sprints()
        {
            $sprints = $this->AdminRepository->getSprint();
            return $sprints ?? [];
        }
        public function get_Classes()
        {
            $classes = $this->AdminRepository->getClasses();
            return $classes ?? [];
        }
        public function get_Competence()
        {
            $comperences = $this->AdminRepository->getCompetence();
            return $comperences ?? [];
        }
    }

?>