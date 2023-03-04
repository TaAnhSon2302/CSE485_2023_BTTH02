<?php
    require '../configs/DBConnection.php';
    session_start();
    if(isset($_POST['login'])){
        $username = $_POST['user_name'];
        $password = $_POST['user_pass'];
        $sql = "SELECT * FROM `users` WHERE tai_khoan = '$username' AND mat_khau = '$password'";
        $record = pdo($pdo, $sql)->fetchAll();
        if($record){
            header('location: ./index.php');
        }
    }

?>