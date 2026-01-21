<?php
    namespace Repository;
use Core\Data;
use Models\Classe;
use Models\Sprint;
use Models\Competence;
use PDO;
class FormateurRepository
{

    private $conn;

    public function __construct()
    {
        $this->conn = Data::getInstance()->connection();
    }
    public function getSprint()
    {
        $query = "SELECT * FROM sprints";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $sprints = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $AllSprints = [];

        foreach ($sprints as $sprintData) {
            $AllSprints[] = new Sprint(
                $sprintData['id'] ?? null,
                $sprintData['nom'] ?? null,
                $sprintData['date_debut'] ?? null,
                $sprintData['date_fin'] ?? null
            );
        }

        return $AllSprints;
    }

    public function getClasses()
    {
        $query = "SELECT c.*, fc.*, u.* 
        FROM classes AS c
        INNER JOIN formateur_classe AS fc ON c.id = fc.classe_id
        INNER JOIN users AS u ON fc.formateur_id = u.id;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $AllClasses = [];
        foreach ($classes as $classe) {
            $AllClasses[] = new Classe(
                $classe['id'],
                $classe['nom'],
                $classe['nombre'],
                $classe['promo'],
                $classe['taux'],
                $classe['firstname'],
                $classe['lastname'],
                $classe['formateur_id']
            );
        }
        return $AllClasses;
    }
    public function getCompetence()
    {
        $query = "SELECT * FROM competences";
        $statment = $this->conn->prepare($query);
        $statment->execute();

        $competences = $statment->fetchAll(PDO::FETCH_ASSOC);

        $AllCompetences = [];
        foreach($competences as $competence)
        {
            $AllCompetences [] = new Competence(
                $competence['id'],
                $competence['nom']
            );
        }

        return $AllCompetences;
    }
}

?>