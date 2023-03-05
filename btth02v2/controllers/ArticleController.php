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
     $articleService = new ArticleService($id);
     $art = $articleService->getArticle($id);
     include('views/article/edit_article.php');
     }
     public function create(){
        include('views/article/add_article.php');
     }
     public function option_add(){
      $authorService = new AuthorService();
      $authors = $authorService->getAllAuthor();
      $categoryService = new CategoryService();
      $categories = $categoryService->getAllCategory();
      include("views/article/add_article.php");
  }
     public function update(){
        $articleService = new ArticleService();
        $article = $articleService->updateArticle($_POST['txtmatbviet'],$_POST['txttieude'],$_POST['txttenbaihat'],$_POST['txttloai'],$_POST['txttomtat'],$_POST['txtnoidung'],$_POST['txtnoidung'],$_POST['file-upload']);
        include('views/article/list_article.php');
     }
     public function add(){
        $articleService = new ArticleService();
        $article = $articleService->addArticle($_POST['txttieude']);
        include('views/article/list_article.php');
     }
     public function delete(){
           $articleService = new ArticleService();
           $article = $articleService->deleteArticle($_GET['id']);

            include("views/article/list_article.php");
     }
 }
?>