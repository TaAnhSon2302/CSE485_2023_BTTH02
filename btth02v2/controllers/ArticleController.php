<?php
require_once("services/ArticleService.php");
require_once("services/CategoryService.php");
require_once("services/AuthorService.php");
 class ArticleController{
     public function index(){
    $articleService = new ArticleService();
    $articles = $articleService->getAllArticles();
    include('views/article/list_article.php');
    }
     public function edit($id){

      $authorService = new AuthorService();
      $id_authors = $authorService->getAllAuthor();
    
      $categoryService = new CategoryService();
      $id_categories = $categoryService->getAllCategory();
      
      $articleService = new ArticleService();
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
     
     public function update(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $mabviet=$_POST['txtmabaiviet'];
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
          $articleService->getUpdateArticles($mabviet,$tieuDe, $baiHat, $maTloai, $tomTat, $noiDung, $maTgia, $ngayViet, $hinhAnh);
          //move_uploaded_file($_FILES['file-upload']['tmp_name'], $link);
          header("Location:index.php?controller=article&action=index");
      }
    }
     public function add(){
          $articleService = new ArticleService();
        //   $articleService->getAddArticles();
          if ($articleService->getAddArticles()) {
            self::index();
        }

      }

     public function delete(){
           $articleService = new ArticleService();
           $articles = $articleService->deleteArticle($_GET['id']);

            header("Location:index.php?controller=article&action=index");
     }
 }
?>