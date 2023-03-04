<?php
  require_once("configs/DBConnection.php");
  include("models/User.php");
  class UserService {
    public function getAllUser() {
      $dbConn = new DbConnection();
      $conn = $dbConn->getConnection();

        $sql = "SELECT * from users ";  
        $stmt = $conn->query($sql);
        
        $users = [];
        while($row = $stmt->fetch()){
            $user = new User($row['tai_khoan'],$row['mat_khau'],$row['id_ngdung'],$row['quyen_han']);
            array_push($users,$user);
        }
        return $users;
    }
  }
  
?>