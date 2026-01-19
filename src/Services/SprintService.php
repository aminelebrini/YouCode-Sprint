<?php

    use Repository\SprintRepository;

    class SprintService{

        private $SprintRepository;

        public function __construct($SprintRepository)
        {
            $this->SprintRepository = $SprintRepository;
        }
        public function createSprint($titre, $dateDebut, $dateFin)
        {
            $Sprints = $this->SprintRepository->addSprint($titre, $dateDebut, $dateFin);
        }

    }

?>