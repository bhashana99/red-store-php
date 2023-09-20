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
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // if (!$row) {
        //     print_r($stmt->errorInfo()); 
        // }

        return $row;
     }

     //Edit category
     public function edit_category($id){
      $sql = "SELECT * FROM categories WHERE id=:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id'=>$id]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      return $row;
     }

     //Update Category
     public function update_category($title,$id){
        $sql = "UPDATE categories SET title=:title WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id,'title'=>$title]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return true;
     }

     //Delete Category
     public function delete_category($id){
        $sql = "DELETE FROM categories WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        
        return true;
     }

     //Check  product
     public function check_product($product_title){
      $sql = "SELECT * FROM product WHERE title=:product_title";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['product_title'=>$product_title]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      return $row;
     }

     //insert product
     public function insert_product($title,$desc,$keyword,$category_id,$img1,$img2,$img3,$img4,$price,$status){
      $sql = "INSERT INTO product(title,desc,keyword,category_id,img1,img2,img3,img4,price,date,status)VALUES (:title,:desc,:keyword,:category_id,:img1,:img2,:img3,:img4,:price,NOW(),:status)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['title'=>$title,'desc'=>$desc,'keyword'=>$keyword,'category_id'=>$category_id,'img1'=>$img1,'img2'=>$img2,'img3'=>$img3,'img4'=>$img4,'price'=>$price,'status'=>$status]);
      return true;
     }

}

   

?>