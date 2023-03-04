<?php
class AuthorController{
    // Hàm xử lý hành động index
    public function index(){
        
    }

    public function add(){
        
        include("views/author/add_author.php");
    }

    public function update(){
        $matgia = get['id'];
        $data = [];
        include("views/author/edit_author.php");
    }
}
?>