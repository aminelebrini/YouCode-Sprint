<?php

    namespace Services;
    use Repository\FormateurRepository;

    class EtudiantService{

    private $FormateurRepository;

        public function __construct($FormateurRepository)
        {
            $this->FormateurRepository = $FormateurRepository;
        }
        public function SoumettreRendu($brief_id,$etudiant_id,$lien,$commentaire)
        {
            return $this->FormateurRepository->Soumettre_Rendu($brief_id,$etudiant_id,$lien,$commentaire);
        }

        public function get_Brief()
        {
            $briefs = $this->FormateurRepository->getAllBriefs();
            return $briefs ?? [];
        }
        public function get_Etudiant()
        {
            $etudiants = $this->FormateurRepository->getEtudiant();
            return $etudiants ?? [];
        }
        public function get_Classes()
        {
            $classes = $this->FormateurRepository->getClasses();
            return $classes ?? [];
        }
    }

?>