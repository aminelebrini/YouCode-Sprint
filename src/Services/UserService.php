<?php
    namespace Services;

    use Repository\UserRepository;

class UserService{
    private $Repository;

    public function login($email, $password)
    {
        $userData = $this->Repository->findByEmail($email);


        if ($userData && password_verify($password, $userData['password'])) {
            return $userData;
        }
        return null;
    }

    
}

?>