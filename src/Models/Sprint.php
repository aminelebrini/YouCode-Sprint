<?php
    namespace Models;
 class Sprint{
    private $id;
    private $titre;
    private $date_debut;
    private $date_fin;
    private $brief_id;

    public function __construct($id,$titre,$date_debut,$date_fin)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getTitre()
    {
        return $this->titre;
    }
    public function getDateDebut()
    {
        return $this->date_debut;
    }
    public function getDateFin()
    {
        return $this->date_fin;
    }
    
 }
?>