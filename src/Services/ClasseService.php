<?php
    namespace Services;

    use Repository\ClasseRepository;
    class ClasseService
    {
        private $ClasseRepository;

        public function __construct($ClasseRepository)
        {
            $this->ClasseRepository = $ClasseRepository;
        }
        public function CreateClasse($nom, $teacher,$capacity,$annescolaire)
        {
            return $this->ClasseRepository->Create_Classe($nom, $teacher,$capacity,$annescolaire);
        }
    }
?>