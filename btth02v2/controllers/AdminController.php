<?php
  require_once("services/ArticleService.php");
  require_once("services/CategoryService.php");
  class AdminController{
    public function index(){
            $categoryService = new CategoryService();
            $category = $categoryService->getAllCategory();

            $articleService = new ArticleService();
            $article  = $articleService->getAllArticles();
            
        include('views/admin/index.php');
    }
  }
?>