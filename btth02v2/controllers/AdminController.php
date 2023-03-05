<?php
  require_once("services/ArticleService.php");
  require_once("services/CategoryService.php");
  require_once("services/AuthorService.php");
  require_once("services/UserService.php");
  class AdminController{
    public function index(){
            $categoryService = new CategoryService();
            $category = $categoryService->getAllCategory();

            $articleService = new ArticleService();
            $article  = $articleService->getAllArticle();

            $authorService = new AuthorService();
            $author = $authorService->getAllAuthor();

            $userService = new UserService();
            $user = $userService->getAllUser();
            
        include('views/admin/index.php');
    }
  }
?>