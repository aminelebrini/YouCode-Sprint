<?php
    namespace Services;

    use Repository\UserRepository;

class UserService{
    private  $UserRepository;

    public function __construct()
    {
        $this->UserRepository = new UserRepository();
    }

    public function login($email, $password)
    {
        $user = $this->UserRepository->findByEmail($email);


        if ($user && $user->getPassword() === $password) {
            return $user;
        }
        return null;
    }
}

?>