<?php
  include("config/DBConnection.php");
  include("models/User.php");
  class USerService {
    public function getUser() {
        $taikhoan = isset($_POST["user_name"]) ? $_POST["user_name"] :'';
        $matkhau = isset($_POST["user_password"]) ? $_POST["user_password"] :'';
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "SELECT * from users where tai_khoan='".$taikhoan."'  and matkhau=  '".$maukhau."'";  
        $stmt  = $conn->querry($sql);
        
        $users = [];
        while($row = $stmt->fetch){
            $users = new Admin($row['tai_khoan'],$row['mat_khau'],$row['id_ngdung'],$row['user_id'],$row['quyen_han']);
            array_push($users,$user);
        }
        return $users;
    }
  }
  
?>