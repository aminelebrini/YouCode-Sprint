<?php

    namespace Services;
    use Repository\FormateurRepository;

    class EtudiantService{

    private $FormateurRepository;

        public function __construct($FormateurRepository)
        {
            $this->FormateurRepository = $FormateurRepository;
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
    }

?>