<?php
DEFINE('HOST','localhost');
DEFINE('DATABASE','porquinhos');
DEFINE('USER', 'root');
DEFINE('PASSWORD', '');

class Connect {
    protected $connection;

    function __construct(){
        $this->connectDatabase();
    }

    function connectDatabase(){
        try{
            $this->connection = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PASSWORD);
        }
        catch(PDOExeption $e){
            echo 'Error: '.$e->getMenssage();
            die();
        }
        
    }

    public function getConnection(){
        return $this->connection;
    }
}
?>