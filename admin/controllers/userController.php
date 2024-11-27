<?php
class accController{
    public $accModel;
    function __construct(){
        $this->accModel=new accModel();
    }

    function listacc(){
        $accProduct=$this->accModel->getAllacc();
        require_once 'views/listacc.php';
    }

    public function deleteUser($id)
    {
        $oneAcc = $this->accModel->getacc($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_delete'])) {
            if ($this->accModel->deleteUser($id)) {
                header("Location: ?act=userslist");
                exit();
            } else {
                echo "Lỗi khi xóa sản phẩm";
            }
        }
        require_once 'views/deleteusers.php';
    }


    function insertacc(){
        require_once 'views/insertacc.php';
        if(isset($_POST['acc_insert'])){
            $user=$_POST['user'];
            $pass=$_POST['pass'];
           
            if($this->accModel->insertacc($user,$pass)){
                echo "<script>alert('Đăng ký thành công')</script>";
                header("Location:?act=login");
            }
            else{
                echo "lỗi";
            }

        }
    }
   

    // function login(){
    //     require_once './view/form/login.php';
    //     if(isset($_POST['btn_login'])){
          
    //         if($this->accModel->checkAcc($_POST['username'],$_POST['password'])>0){
    //             $_SESSION['username']=$_POST['username'];
    //             $_SESSION['id']=$_POST['id'];
    //             $_SESSION['loggedin'] =true;
    //             $username = $this->accModel->getUserByUserName($_POST['username']);
    //            if( $username['role']=="admin"){
    //             // $_SESSION['isAdmin'] =true;
    //             header("Location:admin/");
    //            }else{
    //             header("Location:/TGMoblie");
    //            }
    //         }
    //         else{
    //             echo "<script>alert('Đăng nhập không thành công')</script>";
    //         }
    //     }
        
    // }

    function login() {
        require_once './view/form/login.php';
    
        if (isset($_POST['btn_login'])) {
            // Gọi hàm checkAcc để lấy thông tin tài khoản
            $account = $this->accModel->checkAcc($_POST['username'], $_POST['password']);
            
            if ($account) { // Nếu tài khoản tồn tại
                // Lưu thông tin vào session
                $_SESSION['username'] = $account['username'];
                $_SESSION['id'] = $account['id']; // Lưu user_id
                $_SESSION['email'] = $account['email']; // Lưu user_id
                $_SESSION['phone'] = $account['phone']; // Lưu user_id
                $_SESSION['loggedin'] = true;
    
                // Kiểm tra quyền và chuyển hướng
                if ($account['role'] === "admin") {
                    header("Location: admin/");
                } else {
                    header("Location: /TGMoblie");
                }
            } else {
                echo "<script>alert('Đăng nhập không thành công');</script>";
            }
        }
    }
    
    function logout(){
        unset($_SESSION['username']);
        unset($_SESSION['carts']);
        unset($_SESSION['loggedin']);
        header("Location:/TGMoblie");
    }

    public function deleteacc($id) {
        if ($this->accModel->deleteUser($id)) {
            header("Location: ?act=acc");
            exit();
        } else {
            echo "Lỗi khi xóa sản phẩm";
        }
    }
}

?>