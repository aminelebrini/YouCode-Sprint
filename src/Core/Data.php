<?php

namespace Core;

use PDO;
use PDOException;

class Data
{
    private static ?Data $instance = null;
    private static ?PDO $connection = null;

    public function __construct()
    {
        try{
            self::$connection = new PDO(
                "pgsql:host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT']};dbname={$_ENV['DB_NAME']}",$_ENV['DB_USER'],$_ENV['DB_PASSWORD'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );

            if(self::$connection)
            {
                echo "wa33333";
            }
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public static function getInstance(): Data
    {
        if (self::$instance === null) {
            self::$instance = new Data();
        }
        return self::$instance;
    }
    public function connection()
    {
        return self::$connection;
    }
}

?>