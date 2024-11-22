<?php
session_start();
ob_start();
   require_once '../commons/function.php';
   require_once './controllers/dashboardController.php';
   require_once './controllers/ProductController.php';
   require_once './models/ProductModel.php';

   $act=$_GET['act']??"/";
   match($act){
      '/' => (new dashboardController())->dashboard(),
      'listproduct' => (new productController())->listProduct(),
      'insertproduct' => (new productController())->insertProduct(),
      'updateproduct' => (new productController())->updateProduct($_GET['id']),
      'deleteproduct' => (new productController())->deleteProduct($_GET['id']),
   }
?>