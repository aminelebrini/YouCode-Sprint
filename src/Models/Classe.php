<?php
    namespace Models;

    class Classe
    {
        private $id;
        private $nom;
        private $nombre;
        private $promo;
        private $taux;
        private $firstname;
        private $lastname;
        private $formateurId;

        public function __construct($id,$nom,$nombre,$promo,$taux,$firstname,$lastname,$formateurId)
        {
            $this->id = $id;
            $this->nom = $nom;
            $this->nombre = $nombre;
            $this->promo = $promo;
            $this->taux = $taux;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->formateurId = $formateurId;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getNom()
        {
            return $this->nom;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function getPromo()
        {
            return $this->promo;
        }

        public function getTaux()
        {
            return $this->taux;
        }
        public function getFormateur()
        {
            return $this->firstname . " " . $this->lastname;
        }
        public function getFormateurId()
        {
            return $this->formateurId;
        }

    }
?>