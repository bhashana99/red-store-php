<?php

require_once 'config.php';

class Admin extends Database{
    //Admin Login
    public function admin_login($username,$password){
        $sql = "SELECT username, password FROM admin WHERE username = :username AND password=:password ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username'=>$username, 'password'=>$password]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

     //Check Input category
     public function check_category($category_name){
      $sql = "SELECT * FROM categories WHERE title=:title";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['title'=>$category_name]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      return $row;

     }

     //add new category
     public function insert_category($category_name){
        $sql = "INSERT INTO categories(title) VALUES (:category_name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['category_name'=>$category_name]);
        return true;
     }

     //Fetch All Categories
     public function fetchAll_Categories(){
        $sql = "SELECT title FROM categories";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
     }



}

   

?>