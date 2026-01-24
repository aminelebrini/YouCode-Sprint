<?php

    namespace Repository;

    use Core\Data;
    use Models\Brief;
    use Models\Etudiant;
    use Models\Classe;
    use PDO;

    class EtudiantRepository
    {
        private $conn;

        public function __construct()
        {
            $this->conn = Data::getInstance()->connection();
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
        $query = "SELECT 
                b.id, 
                b.titre, 
                b.description, 
                b.type, 
                b.sprint_id, 
                b.date_debut, 
                b.date_fin, 
                b.formateur_id,
                STRING_AGG(c.nom, ', ') as all_competences 
                FROM briefs b 
                INNER JOIN competence_brief cb ON b.id = cb.brief_id 
                INNER JOIN competences c ON cb.competence_id = c.id
                GROUP BY 
                b.id, 
                b.titre, 
                b.description, 
                b.sprint_id, 
                b.date_debut, 
                b.date_fin, 
                b.formateur_id";
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
                $brief['all_competences'],
                $brief['formateur_id']
            );

        }
        return $AllBriefs;

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

}

?>