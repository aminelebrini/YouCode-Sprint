<?php
namespace Repository;

use Core\Data;
use Models\Classe;
use Models\Sprint;
use PDO;

class AdminRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = Data::getInstance()->connection();
    }

    public function create_users($nom, $prenom, $role, $email, $password)
    {
        $passwordHach = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users (firstname, lastname, email, password, role) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nom, $prenom, $email, $passwordHach, $role]);

        if ($role === 'Formateur') {
            $userId = $this->conn->lastInsertId(); 
            $query = "INSERT INTO formateurs (user_id) VALUES (?)";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([$userId]);
        }

    }
    public function Create_Classe($nom, $capacity, $annescolaire)
    {
        $query = "INSERT INTO classes (nom, nombre, promo, taux) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nom, $capacity, $annescolaire, 0]);
    }

    public function addSprint($titre, $dateDebut, $dateFin)
    {
        $query = "INSERT INTO sprints (nom, date_debut, date_fin) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$titre, $dateDebut, $dateFin]);
    }

    public function Assigne($ClasseId, $FormateurId)
{
    $query = "INSERT INTO formateur_classe (formateur_id, classe_id) VALUES (?, ?)";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$FormateurId, $ClasseId]);
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
                $classe['lastname']
            );
        }
        return $AllClasses;
    }
}
?>
