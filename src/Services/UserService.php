<?php
namespace Services;

use Repository\UserRepository;

class UserService {
    private $userRepo;

    public function __construct(UserRepository $repo) {
        $this->userRepo = $repo;
    }

    public function login($email, $password) {
        $user = $this->userRepo->findByEmail($email);

        if (password_verify($password,$user->getPassword())) {
            return $user;
        }
        return null;
    }

    public function getUsers() {
        return $this->userRepo->getAllUsers();
    }
}
?>
