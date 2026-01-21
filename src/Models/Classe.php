<?php
    namespace Models;

    class Classe
    {
        private $id;
        private $nom;
        private $nombre;
        private $promo;
        private $taux;
        private $formateur;

        public function __construct($id,$nom,$nombre,$promo,$taux,$formateur)
        {
            $this->id = $id;
            $this->nom = $nom;
            $this->nombre = $nombre;
            $this->promo = $promo;
            $this->taux = $taux;
            $this->formateur = $formateur;
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
            return $this->formateur;
        }

    }
?>