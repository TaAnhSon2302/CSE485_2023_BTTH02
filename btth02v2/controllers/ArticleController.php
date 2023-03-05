<?php
require("services/ArticleService.php");
require("services/CategoryService.php");
require("services/AuthorService.php");
 class ArticleController{
     public function index(){
    $articleService = new ArticleService();
    $articles = $articleService->getAllArticles();
    include('views/article/list_article.php');
     }
     public function edit($id){
        $authorService = new AuthorService($id);
        $id_authors = $authorService->get_id_Article($id);
        $categoryService = new CategoryService($id);
        $id_categories = $categoryService->get_id_Article($id);
        $articleService = new ArticleService($id);
        $id_articles = $articleService->get_id_Article($id);
        include("views/article/edit_article.php");
    }
     public function create(){
      $authorService = new AuthorService();
      $authors = $authorService->getAllAuthor();
      $categoryService = new CategoryService();
      $categories = $categoryService->getAllCategory();
        include('views/article/add_article.php');
     }
     
     public function update($id){
        $articleService = new ArticleService($id);
        $article = $articleService->updateArticle($_POST['txtmatbviet'],$_POST['txttieude'],$_POST['txttenbaihat'],$_POST['txttloai'],$_POST['txttomtat'],$_POST['txtnoidung'],$_POST['txtnoidung'],$_POST['file-upload']);
        include('views/article/edit_article.php');
     }
     public function add(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $tieuDe = $_POST['txttieude'];
          $baiHat = $_POST['txttenbaihat'];
          $maTloai = $_POST['txttloai'];
          $tomTat = $_POST['txttomtat'];
          $noiDung = $_POST['txtnoidung'];
          $maTgia = $_POST['txttgia'];
          $ngayViet = $_POST['date-input'];
          $link =  $_POST['path'].$_FILES['file-upload']['name'];
          $hinhAnh = $_FILES['file-upload']['name'];

          $articleService = new ArticleService();
          $articleService->getAddArticles($tieuDe, $baiHat, $maTloai, $tomTat, $noiDung, $maTgia, $ngayViet, $hinhAnh);
          move_uploaded_file($_FILES['file-upload']['tmp_name'], $link);
          header("Location:index.php?controller=article&action=index");

      }
  }

     public function delete(){
           $articleService = new ArticleService();
           $article = $articleService->deleteArticle($_GET['id']);

            include("views/article/list_article.php");
     }
 }
?>