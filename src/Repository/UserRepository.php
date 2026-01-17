<?php

    namespace Repository;

    use Core\Data;

    class UserRepository{

        private $conn;

        public function __construct() {
            $this->conn = Data::getInstance()->connection();
        }

        public function findByEmail($email)
        {
            $query = "SELECT * FROM users WHERE email = ?";
            $statement = $this->conn->prepare($query);
            $statement->execute([$email]);

            return $statement->fetchAll();
        }
    }
?>