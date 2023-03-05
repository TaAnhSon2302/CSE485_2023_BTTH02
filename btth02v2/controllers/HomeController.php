<?php
    require("services/ArticleService.php");
    class HomeController{
        public function index(){
            $articelService = new ArticleService();
            $articles = $articelService->getAllArticle();

            include("views/home/index.php");
        }
}
?>