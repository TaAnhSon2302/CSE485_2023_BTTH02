<?php
require_once("configs/DBConnection.php");
include("models/Category.php");
class CategoryService{
    public function getAllCategory(){
        $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();
       $sql = "SELECT * FROM theloai";
       $stmt = $conn->query($sql);   
      
       $categories = [];
       while($row = $stmt->fetch()){
           $category = new Category( $row['ma_tloai'], $row['ten_tloai']);
           array_push($categories,$category);
       }
       return $categories;
    }
    
}
?>