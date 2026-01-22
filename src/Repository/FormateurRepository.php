<?php
    namespace Repository;
use Core\Data;
use Models\Classe;
use Models\Sprint;
use Models\Competence;
use Models\Brief;
use PDO;
class FormateurRepository
{

    private $conn;

    public function __construct()
    {
        $this->conn = Data::getInstance()->connection();
    }

    public function Create_Brief($Titre,$DateDebut,$DateFin,$SprintId,$type,$CompetenceId,$Description)
    {
        $query = "INSERT INTO briefs (nom, description, type, sprint_id, date_debut, date_fin) VALUES(?,?,?,?,?,?)";
        $statment = $this->conn->prepare($query);

        if(is_array($type))
        {
            foreach($type as $Type)
            {
                $statment->execute([$Titre,$Description,$Type,$SprintId,$DateDebut,$DateFin]);
            }
        }
        else{
            $statment->execute([$Titre,$Description,$type,$SprintId,$DateDebut,$DateFin]);
        }
        $BriefId = $this->conn->lastInsertId();
        $query = "INSERT INTO competence_brief (brief_id, competence_id) VALUES (?,?)";
        $statment = $this->conn->prepare($query);

        if(!is_array($CompetenceId))
        {
            $statment->execute([$BriefId,$CompetenceId]);
        }else{
            foreach($CompetenceId as $competenceid)
            {
                $statment->execute([$BriefId, $competenceid]);
            }
        }

    }

    // public function get_brief()
    // {

    // }
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

    public function getAllBriefs()
    {
        $query = "SELECT b.* , cb.*, c.* FROM briefs as b inner join competence_brief as cb on b.id = cb.brief_id inner join competences as c on cb.competence_id = c.id";
        $statment = $this->conn->prepare($query);
        $statment->execute();

        $briefs = $statment->fetchAll(PDO::FETCH_ASSOC);

        $AllBriefs = [];

        foreach($briefs as $brief)
        {
            $AllBriefs [] = new Brief(
                $brief['id'],
                $brief['titre'],
                $brief['description'],
                $brief['type'],
                $brief['sprint_id'],
                $brief['date_debut'],
                $brief['date_fin'],
                $brief['nom']
            );

        }
        return $AllBriefs;

    }
}

?>