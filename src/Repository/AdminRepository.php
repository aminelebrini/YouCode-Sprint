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
    public function create_users($nom, $prenom, $role,$email,$password)
    {
        $passwordHach = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (firstname, lastname, email, password,role) values(?,?,?,?,?)";
        $statement = $this->conn->prepare($query);
        $statement->execute([$nom,$prenom,$email,$passwordHach,$role]);
        return true;
    }
    public function Create_Classe($nom,$capacity,$annescolaire)
    {
        $query = "INSERT INTO classes (nom, nombre, promo, taux) values(?,?,?,?)";
        $statement = $this->conn->prepare($query);
        return $statement->execute([$nom, $capacity,$annescolaire, 0]);

        $queryForm = "INSERT INTO formateur_classe ()";
    }
    public function addSprint($titre, $dateDebut, $dateFin)
    {
        $query = "INSERT INTO sprints (nom, date_debut, date_fin) values(?,?,?)";
        $statement = $this->conn->prepare($query);
        return $statement->execute([$titre, $dateDebut, $dateFin]);
    }
    public function Assigne($ClasseId,$FormateurId)
    {
        $query = "INSERT INTO formateur_classe (formateur_id,classe_id) VALUES(?,?)";
        $statement = $this->conn->prepare($query);
        $statement->execute([$FormateurId,$ClasseId]);
    }
    public function getSprint()
    {
        $query = "SELECT * FROM sprints";
        $statement = $this->conn->prepare($query);
        $statement->execute();

        $sprints = $statement->fetchAll(PDO::FETCH_ASSOC);

        $AllSprints = [];

        if ($sprints) {
            foreach ($sprints as $sprintData) {
                $AllSprints[] = new Sprint(
                    $sprintData['id'] ?? null,
                    $sprintData['nom'] ?? null,
                    $sprintData['date_debut'] ?? null,
                    $sprintData['date_fin'] ?? null
                );
            }
        }

        return $AllSprints;
    }
    public function getClasses()
    {
        $query = "SELECT * FROM classes";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll(PDO::FETCH_ASSOC);

        $AllClasses = [];

        if($classes)
        {
            foreach($classes as $classe)
            {
                $AllClasses [] = new Classe(
                    $classe['id'],
                    $classe['nom'],
                    $classe['nombre'],
                    $classe['promo'],
                    $classe['taux'],
                    $classe['formateur']
                );
            }
        }
        return $AllClasses;
    }
}

?>