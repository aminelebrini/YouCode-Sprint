<?php
    namespace Services;

    use Repository\SprintRepository;

    class SprintService{

        private $SprintRepository;

        public function __construct($SprintRepository)
        {
            $this->SprintRepository = $SprintRepository;
        }
        public function createSprint($titre, $dateDebut, $dateFin)
        {
            return $this->SprintRepository->addSprint($titre, $dateDebut, $dateFin);
        }

    }

?>