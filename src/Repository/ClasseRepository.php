<?php
    namespace Repository;
    
    use Core\Data;
    use Models\Sprint;
    use PDO;
    
    class ClasseRepository
    {
       private $conn;
       
       
       public function __construct()
       {
        $this->conn = Data::getInstance()->connection();
       }
       public function Create_Classe($nom, $teacher,$capacity,$annescolaire)
       {
            $query = "INSERT INTO classes (nom, nombre, promo, taux) values(?,?,?,?)";
            $statement = $this->conn->prepare($query);
            return $statement->execute([$nom, $teacher,$capacity,$annescolaire]);
       }
    }
?>