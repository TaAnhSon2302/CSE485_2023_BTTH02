<?php
 require_once("services/UserService.php");
    class LoginController{
        public function index(){
            include("views/home/login.php");
        }
        public function login()
        {
            $userService = new UserService();
            $username = $_POST['user_name'];
            $password = $_POST['user_pass'];
    
            $user = $userService->login($username, $password);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: index.php?controller=admin');
                exit;
            } else {
                echo 'Login failed';
                exit;
            }
        }
        public function logout()
        {
            session_start();
            unset($_SESSION['user']);
            session_destroy();
            header('Location: index.php?controller=login');
            exit;
        }
    }
?>