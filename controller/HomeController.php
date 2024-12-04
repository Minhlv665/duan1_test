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

    function detail($id){
        $product=$this->homeModel->findProduct($id);
        $productscomment = $this->homeModel->getProductscomment($id);
        // var_dump($productscomment);
        if(isset($_POST['btn_comment'])){
            $user_id=$_SESSION['id'];
            $content=$_POST['content'];         
            $this->homeModel->insertcomment($user_id,$content,$id);
            $productscomment = $this->homeModel->getProductscomment($id);
            // var_dump($_SESSION['id']);
        }
        if(isset($_POST['addcart'])){

            if( $_SESSION['loggedin'] ==true){
                
                    if (isset($_SESSION['carts'])) {
                        $carts = $_SESSION['carts'];
                        $found = false;

                        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
                    
                        foreach ($carts as &$cart) {
                            if ($cart['id'] == $id) {
                                $cart['quantity'] +=1; // Tăng quantity lên 1
                                $found = true;
                                break; // Nếu tìm thấy, thoát vòng lặp
                            }
                        }
                
                        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới vào giỏ hàng
                        if (!$found) {
                            $_SESSION['carts'][] = ['id' => $id, 'quantity' => 1];

                        }else{
                            $_SESSION['carts'] =$carts ;
                        }

                       
                       
                    } else {
                        // Nếu giỏ hàng chưa có, tạo mới giỏ hàng với sản phẩm đầu tiên
                        $_SESSION['carts'] = [['id' => $id, 'quantity' => 1]];
                    }
                    // print_r($_SESSION['carts'] );
                   
            }
            else{
                
                header("Location:?act=login");
            }
        }


        // 1. check login chưa nếu chưa đẩy về trang login
        // 2. lưu sản phẩm vào session cart


        //  2.1 lấy sản phẩm từ session tên cart đặt vào biến $carts nếu null thì khởi tạo 1 bển rỗng  []
        //  2.2 tìm kiếm trong mảng $carts theo điều kiện id sản phẩm có trong $carts hay không 
        //    $carts =[{id:1,quanity:1},{id:2,quanity:1}]
        //   nếu có : thì gán quanity quanity +1;
        // nếu chưa có : thì add thêm sản phẩm vào $carts theo format sau  : 
            //  $carts =[{id:1,quanity:1},{id:2,quanity:1},{id:3 ,quanity:1}]
            
        //  2.3  gán lại $carts vào trong session

        // if (isset($_SESSION['product_id']) && !empty($_SESSION['product_id'])) {
        //     echo "ID đã được lưu vào session: " . $_SESSION['id'];
        // } else {
        //     echo "ID chưa được lưu vào session.";
        // }
        require_once './view/form/product.php';

    }

    
}