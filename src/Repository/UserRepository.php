<?php

    namespace Repository;

    use Core\Data;
    use Models\User;

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
            $user = $statement->fetchAll();

            $AllUser = [];

            foreach($user as $us)
            {
                $AllUser = new User(
                        $us['firstname'],
                        $us['lastname'],
                        $us['email'],
                        $us['password'],
                        $us['role'],
                    );
            }
        }
    }
?>