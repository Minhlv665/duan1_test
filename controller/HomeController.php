<?php
   require_once './model/HomeModel.php';
   class homeController{
    public $homeModel;
    function __construct(){
        $this->homeModel=new homeModel();
    }
    function home(){
        $product=$this->homeModel->allProduct();
        require_once './view/form/home.php';
    }

    
}