<?php

    namespace Repository;

    use Core\Data;
    use Models\User;

    
    class UserRepository{

        private $conn;

        public function __construct() {
            $this->conn = Data::getInstance()->connection();
        }

        public function findByEmail($email = null)
        {
            $query = "SELECT * FROM users WHERE email = ?";
            $statement = $this->conn->prepare($query);
            $statement->execute([$email]);
            $user = $statement->fetch();

            $AllUser = [];

            if($user){
                $AllUser = new User(
                        $user['id'],
                        $user['firstname'],
                        $user['lastname'],
                        $user['email'],
                        $user['password'],
                        $user['role'],
                    );
            }
            return $AllUser;
        }
    }
?>