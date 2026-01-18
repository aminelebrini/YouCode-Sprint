<?php
 namespace Models;
class User{
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $role;

    public function __construct($firstname,$lastname,$email,$password,$role)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }
}
?>