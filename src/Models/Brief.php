<?php

    namespace Models;

    class Brief
    {
        private $id;
        private $nom;
        private $description;
        private $type;
        private $sprintId;
        private $competence;
        private $date_debut;
        private $date_fin;
        private $formateur_id;


        public function __construct($id,$nom,$description, $type,$sprintId,$date_debut,$date_fin,$competence,$formateur_id)
        {
            $this->id = $id;
            $this->nom = $nom;
            $this->description = $description;
            $this->type = $type;
            $this->sprintId = $sprintId;
            $this->date_debut = $date_debut;
            $this->date_fin = $date_fin;
            $this->competence = $competence;
            $this->formateur_id = $formateur_id;
        }

        public function getId()
        {
            return $this->id;
        }
        public function getTitre()
        {
            return $this->nom;
        }
        public function getDescription()
        {
            return $this->description;
        }
        public function getType()
        {
            return $this->type;
        }
        public function getSprint()
        {
            return $this->sprintId;
        }
        public function getDateDebut()
        {
            return $this->date_debut;
        }
        public function getDateFin()
        {
            return $this->date_fin;
        }
        public function getCompetence()
        {
            return $this->competence;
        }

        public function getFomrateurId()
        {
            return $this->formateur_id;
        }
    }

?>