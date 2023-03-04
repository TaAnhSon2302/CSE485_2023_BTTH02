<?php
require_once("configs/DBConnection.php");
include("models/Author.php");
class AuthorService{
    public function getAllAuthor(){
        $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();
       $sql = "SELECT * FROM tacgia";
       $stmt = $conn->query($sql);   
      
       $authors = [];
       while($row = $stmt->fetch()){
           $author = new Author( $row['ma_tgia'], $row['ten_tgia']);
           array_push($authors,$author);
       }
       return $authors;
    }
    
}
?>