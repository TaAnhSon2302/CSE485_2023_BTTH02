<?php
require("services/ArticleService.php");
class HomeController{
    public function show(){
    $ArticleService = new ArticleService();
    $DetailService = $ArticleService->getAllArticles($mabviet); 
    include('views/home/detail.php');
}
}