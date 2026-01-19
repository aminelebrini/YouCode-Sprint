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
            $statement->execute([$titre, $dateDebut, $dateFin]);
        }
    }

?>