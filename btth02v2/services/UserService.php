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
            $user = new User($row['id_ngdung'],$row['tai_khoan'],$row['mat_khau'],$row['quyen_han']);
            array_push($users,$user);
        }
        return $users;
    }
    public function getUser($id) {
      $dbConn = new DbConnection();
      $conn = $dbConn->getConnection();

        $sql = "SELECT * from users where id_ngdung ='".$id."' ";  
        $stmt = $conn->query($sql);
        
        $users = [];
        while($row = $stmt->fetch()){
            $user = new User($row['id_ngdung'],$row['tai_khoan'],$row['mat_khau'],$row['quyen_han']);
            array_push($users,$user);
        }
        return $users;
    }
    public function updateUser($id, $account, $password, $role){
 
      $dbConn = new DBConnection();
      $conn = $dbConn->getConnection();


      $sql_update = "UPDATE `users` SET `tai_khoan`=' " . $account . " ', `mat_khau`=' " . $password . " ', `quyen_han`=' " . $role . " ' WHERE `id_ngdung` = '" . $id . "' ";
      $stmt_update = $conn->query($sql_update);

      $sql_select = "SELECT * FROM users";
      $stmt_select = $conn->query($sql_select);

   
      $users = [];
      while($row = $stmt_select->fetch()){
          $user = new User($row['id_ngdung'], $row['tai_khoan'], $row['mat_khau'], $row['quyen_han']);
          array_push($users,$user);
      }

      return $users;
  }
  public function addUser($account, $password, $role){
  
    $dbConn = new DBConnection();
    $conn = $dbConn->getConnection();

    $sql_add = "INSERT INTO `users`(`tai_khoan`, `mat_khau`, `quyen_han`) VALUES ('" . $account . "', '" . $password . "', '" . $role . "')";
    $stmt_add = $conn->query($sql_add);

    $sql_select = "SELECT * FROM users";
    $stmt_select = $conn->query($sql_select);

    $users = [];
    while($row = $stmt_select->fetch()){
        $user = new User($row['id_ngdung'], $row['tai_khoan'], $row['mat_khau'], $row['quyen_han']);
        array_push($users,$user);
    }

    return $users;
}
public function deleteUser($id){
  
  $dbConn = new DBConnection();
  $conn = $dbConn->getConnection();

  $sql_delete = "DELETE FROM `users` WHERE `id_ngdung` = '" . $id . "'";
  $stmt_delete = $conn->query($sql_delete);

  $sql_select = "SELECT * FROM users";
  $stmt_select = $conn->query($sql_select);

  $users = [];
  while($row = $stmt_select->fetch()){
      $user = new User($row['id_ngdung'], $row['tai_khoan'], $row['mat_khau'], $row['quyen_han']);
      array_push($users,$user);
  }

  return $users;
}
public function login($username, $password)
{
    $dbConn = new DBConnection();
    $conn = $dbConn->getConnection();

    try {
        $sql = "SELECT * FROM users WHERE tai_khoan = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);

        $user = null;
        if ($row = $stmt->fetch()) {
            if ($password == $row['mat_khau']) {
                $user = new User($row['id_nguoidung'], $row['tai_khoan'], $row['mat_khau'], $row['quyen_han']);
            }
        }
        return $user;
    } catch (Exception $e) {
        throw new Exception("Error authenticating user: " . $e->getMessage());
    } finally {
        $conn = null;
    }
  }
}
?>