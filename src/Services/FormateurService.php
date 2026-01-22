<?php

    namespace Services;

    use Repository\FormateurRepository;

    class FormateurService
    {
        private $FormateurRepository;

        public function __construct($FormateurRepository)
        {
            $this->FormateurRepository = $FormateurRepository;
        }
        public function CreateBrief($Titre,$DateDebut,$DateFin,$SprintId,$type,$CompetenceId,$Description)
        {
            return $this->FormateurRepository->Create_Brief($Titre,$DateDebut,$DateFin,$SprintId,$type,$CompetenceId,$Description);
        }
        public function get_Sprints()
        {
            $sprints = $this->FormateurRepository->getSprint();
            return $sprints ?? [];
        }
        public function get_Classes()
        {
            $classes = $this->FormateurRepository->getClasses();
            return $classes ?? [];
        }
        public function get_Competence()
        {
            $comperences = $this->FormateurRepository->getCompetence();
            return $comperences ?? [];
        }
        public function get_Brief()
        {
            $briefs = $this->FormateurRepository->getAllBriefs();
            return $briefs ?? [];
        }
    }
?>