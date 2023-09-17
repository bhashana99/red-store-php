<?php

class Database{

// dsn=data source network
private $dsn = "mysql:host=localhost;port=3307;dbname=redstore";
private $dbUser = "root";
private $dbPassword = "";

public $conn;

public function __construct(){
    try{
        $this->conn = new PDO($this->dsn,$this->dbUser,$this->dbPassword);
        echo 'database connected!';
    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
    }
}






}







?>