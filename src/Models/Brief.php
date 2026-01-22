<?php

    namespace Models;

    class Brief
    {
        private $id;
        private $nom;
        private $description;
        private $type;
        private $sprintId;


        public function __construct($id,$nom,$description, $type,$sprintId)
        {
            $this->id = $id;
            $this->nom = $nom;
            $this->description = $description;
            $this->type = $type;
            $this->sprintId = $sprintId;
        }

        public function getId()
        {
            return $this->id;
        }
        public function getNom()
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
    }

?>