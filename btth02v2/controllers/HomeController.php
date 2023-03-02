<?php

if(isset($_GET['action'])){
     $action = $_GET['action'];
 }
 else{
     $action = '';
 }

// $thanhcong = array();

 switch($action){
     case 'trangchu':{   
         $tbltenbang = "baiviet";
         $data = $db->getAllData($tbltenbang); 
         require_once('views/home/index.php');
         break;
     }
     case 'detail':{
        // $ma_bviet = $_GET['ma_bviet'];
        $tbltenbang = "baiviet INNER JOIN tacgia
        ON tacgia.ma_tgia = baiviet.ma_tgia
        INNER JOIN theloai
        ON baiviet.ma_tloai = theloai.ma_tloai
         ";
        $data = $db->getAllData($tbltenbang);   

        require_once('views/home/detail.php');
        break;
    }
    case 'login':{
        $tbltenbang = "users";
        $data = $db->getAllData($tbltenbang); 
        require_once('views/home/login.php');
        break;
    }
    case 'admin':{
        require_once('views/admin/index.php');
        break;
    }
 }
?>