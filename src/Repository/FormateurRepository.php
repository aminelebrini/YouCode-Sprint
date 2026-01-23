<?php
    namespace Repository;
use Core\Data;
use Models\Classe;
use Models\Sprint;
use Models\Competence;
use Models\Brief;
use Models\Etudiant;
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

    public function Assign_Students($studentId,$classId)
    {
        $query = "UPDATE etudiants SET classe_id = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([(int)$classId, (int)$studentId]);
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
    $query = "
        SELECT 
            c.id   AS classe_id,
            c.nom,
            c.nombre,
            c.promo,
            c.taux,
            u.firstname,
            u.lastname,
            u.id   AS formateur_id
        FROM classes AS c
        INNER JOIN formateur_classe AS fc ON c.id = fc.classe_id
        INNER JOIN users AS u ON fc.formateur_id = u.id
    ";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $AllClasses = [];
    foreach ($classes as $classe) {
        $AllClasses[] = new Classe(
            $classe['classe_id'],
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

    public function getEtudiant()
    {
        $query = "SELECT 
            u.id AS user_id,
        u.firstname,
        u.lastname,
        u.email,
        u.password,
        u.role,
        e.username,
        e.level,
        e.classe_id,
        c.nom AS classe_nom,
        fc.formateur_id
        FROM users u
        INNER JOIN etudiants e ON u.id = e.user_id
        LEFT JOIN classes c ON e.classe_id = c.id
        LEFT JOIN formateur_classe fc ON fc.classe_id = c.id
        WHERE u.role = 'Etudiant'";
        $statment = $this->conn->prepare($query);
        $statment->execute();

        $etudiants = $statment->fetchAll(PDO::FETCH_ASSOC);

        $AllEtudiants = [];

        foreach($etudiants as $etudiant)
        {
            if(empty($etudiant['level']))
            {
                $level = '0';
                $AllEtudiants [] = new Etudiant(
                $etudiant['user_id'],
                $etudiant['firstname'],
                $etudiant['lastname'],
                $etudiant['email'],
                $etudiant['password'],
                $etudiant['role'],
                $etudiant['username'],
                //$level,
               // $etudiant['classe_nom'],
                $etudiant['formateur_id'],
                $etudiant['classe_id']
                );
            }
        }
        return $AllEtudiants;
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