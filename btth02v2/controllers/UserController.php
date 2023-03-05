<?php
 require_once("services/UserService.php");

 class UserController{
    public function index(){
    $userService = new UserService();
    $user = $userService->getAllUser();
    include('views/user/user.php');
    }
    public function edit($id){
        $userService = new UserService();
        $use = $userService->getUser($id);
        include('views/user/edit_user.php');
    }
    public function update(){
        $userService = new UserService();
        $user = $userService->updateUser($_POST['txtId'], $_POST['txtusername'], $_POST['txtpassword'], $_POST['txtquyenhan']);
        include('views/user/user.php');
     }
     public function create(){
        include('views/user/add_user.php');
 }
 public function add(){
    $userService = new UserService();
    $user = $userService->addUser($_POST['txtId'],$_POST['txtusername'], $_POST['txtpassword'], $_POST['txtquyenhan']);
    include('views/user/user.php');
 }
 public function delete(){
    $userService = new UserService();
    $user = $userService->deleteUser($_GET['id']);
    include("views/user/user.php");
}
}
?>