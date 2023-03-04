<?php 
require_once("configs/DBConnection.php");
include("models/Author.php");
class AuthorService {
    public function getAllAuthor(){
        $dbConn = new DbConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM tacgia";
        $stmt = $conn->query($sql);
        $authors = [];
        while($row = $stmt->fetch()){
            $author = new Article( $row['ten_tgia'],$row['ma_tgia']);
            array_push($authors,$author);
        }
        return $authors;
    }
}
?>