<?php
require("services/CategoryService.php");
 class CategoryController{
     public function index(){
    $categoryService = new CategoryService();
    $category = $categoryService->getAllCategory();
    include('views/category/category.php');
     }
     public function edit($id){
     $categoryService = new CategoryService($id);
     $cate = $categoryService->getCategory($id);
     include('views/category/edit_category.php');
     }
     public function create(){
        include('views/category/add_category.php');
     }
     public function update(){
        $categoryService = new CategoryService();
        $category = $categoryService->updateCategory($_POST['txtmatheloai'],$_POST['txttentheloai']);
        include('views/category/category.php');
     }
     public function add(){
        $categoryService = new CategoryService();
        $category = $categoryService->addCategory($_POST['txttentheloai']);
        include('views/category/category.php');
     }
     public function delete(){
           $categoryService = new CategoryService();
           $category = $categoryService->deleteCategory($_GET['id']);

            include("views/category/category.php");
     }
 }
?>