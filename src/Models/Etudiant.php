<?php

namespace Models;

use Models\User;

class Etudiant extends User
{
    private ?int $formateur_id;
    private int $student_id;
    private ?int $classe_id;
    private $username;

    public function __construct(
        int $student_id,
        string $firstname,
        string $lastname,
        string $email,
        string $password,
        string $role,
        string $username,
        ?int $formateur_id = null,
        ?int $classe_id = null
    ) {
        parent::__construct($student_id, $firstname, $lastname, $email, $password, $role);

        $this->student_id = $student_id;
        $this->formateur_id = $formateur_id;
        $this->classe_id = $classe_id;
        $this->username = $username;
    }

    public function getId(): int
    {
        return $this->student_id;
    }

    public function getFormateurId(): ?int
    {
        return $this->formateur_id;
    }

    public function getClasseId(): ?int
    {
        return $this->classe_id;
    }

    public function getUsername()
    {
        return $this->username;
    }
}
?>
