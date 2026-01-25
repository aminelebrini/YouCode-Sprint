<?php

    namespace Models;

class Rendu
{
    private $brief_name;
    private $link;
    private $commentaire;
    private $student_firstname;
    private $student_lastname;
    private $date_soumission;
    private $prof_id;
    private $Competences;

    public function __construct($brief_name, $link, $commentaire, $student_firstname, $student_lastname, $date_soumission,$prof_id,array $Competences)
    {
        $this->brief_name = $brief_name;
        $this->link = $link;
        $this->commentaire = $commentaire;
        $this->student_firstname = $student_firstname;
        $this->student_lastname = $student_lastname;
        $this->date_soumission = $date_soumission;
        $this->prof_id = $prof_id;
        $this->Competences = $Competences;
    }

    public function getBriefName()
    {
        return $this->brief_name;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }

    public function getStudentFirstname()
    {
        return $this->student_firstname;
    }

    public function getStudentLastname()
    {
        return $this->student_lastname;
    }

    public function getFullName()
    {
        return $this->student_firstname . ' ' . $this->student_lastname;
    }

    public function getDateSoumission()
    {
        return $this->date_soumission;
    }

    public function getFormateurId()
    {
        return $this->prof_id;
    }
    public function getCompetenceId(): array {
        if (is_array($this->Competences)) {
            return $this->Competences;
        }
        return [$this->Competences]; 
    }
}

?>