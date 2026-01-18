<?php
namespace Models;

class User {
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $role;

    public function __construct($id,$firstname, $lastname, $email, $password, $role) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }
    public function getId() { return $this->id; }
    public function getFirstname() { return $this->firstname; }
    public function getLastname() { return $this->lastname; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getRole() { return $this->role; }
}
?>
