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

//Check Input
public function test_input($data){
    $data = trim($data); // to remove all white spaces
    $data = stripcslashes($data); // to remove all slashes
    $data = htmlspecialchars($data); // to remove special characters
    
    return $data;

}




}







?>