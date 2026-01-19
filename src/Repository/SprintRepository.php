<?php

    namespace Repository;

    use Core\Data;
    use Models\Sprint;
    use PDO;

    class SprintRepository
    {
        private $conn;

        public function __construct() {
            $this->conn = Data::getInstance()->connection();
        }
        public function addSprint($titre, $dateDebut, $dateFin)
        {
            $query = "INSERT INTO sprints (nom, date_debut, date_fin) values(?,?,?)";
            $statement = $this->conn->prepare($query);
            return $statement->execute([$titre, $dateDebut, $dateFin]);
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
    }

?>