<?php

    namespace Models;

    use Models\User;

    class Etudiant extends User
    {
        public function __construct($id = '', $firstname = '', $lastname = '', $email = '', $password = '', $role = '')
        {
            return parent::__construct($id, $firstname, $lastname, $email, $password, $role);
        }
    }

?>