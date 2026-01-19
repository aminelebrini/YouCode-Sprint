<?php
namespace Repository;

use Core\Data;
use Models\User;
use PDO;

class UserRepository {
    private $conn;

    public function __construct() {
        $this->conn = Data::getInstance()->connection();
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return new User(
                $user['id'],
                $user['firstname'],
                $user['lastname'],
                $user['email'],
                $user['password'],
                $user['role']
            );
        }
        return null;
    }

    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $usersData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $users = [];
        foreach ($usersData as $user) {
            $users[] = new User(
                $user['id'],
                $user['firstname'],
                $user['lastname'],
                $user['email'],
                $user['password'],
                $user['role']
            );
        }

        return $users;
    }
}
?>
