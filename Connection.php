<?php
class Connection{

    public static $connection = false;

    //creating a private constructor
    private function _construct(){



    }


    //pdo connection
    public static function connect($config){
        try{
            if(!self::$connection){
                $con=new PDO("mysql:host={$config['server']};
                dbname={$config['dbname']}",
                $config['dbuser'],
                $config['dbpass']);

                $con->setAttriute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
                $con->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_ASSOC);
                self::$connection=$con;
                return self::$connection;
            }
        }catch(\PDOException $e){
             echo $e->getMessage();
             exit;
        }
    }

}