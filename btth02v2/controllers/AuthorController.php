<?php
require("services/AuthorService.php");
class AuthorController{
    // Hàm xử lý hành động index
    public function index(){
        $authorService = new AuthorService();
        $author = $authorService->getAllAuthor();
    include('views/author/author.php');
    }
    public function edit($id){
        $authorService = new AuthorService($id);
        $aut = $authorService->getAuthor($id);
        include('views/author/edit_author.php');
        }

     public function update(){
        $authorService = new AuthorService();
        $author = $authorService->updateAuthor($_POST['txtmatgia'],$_POST['txttentgia']);
        include('views/author/author.php');
     }
     
     public function create(){
        include('views/author/add_author.php');
     }

     public function add(){
        $authorService = new AuthorService();
        $author = $authorService->addAuthor($_POST['txttentgia']);
        include('views/author/author.php');
     }

     public function delete(){
        $authorService = new AuthorService();
        $author = $authorService->deleteAuthor($_GET['id']);
         include("views/author/author.php");
  }
}
?>