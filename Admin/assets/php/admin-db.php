<?php

require_once './config.php';

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




}

   

?>