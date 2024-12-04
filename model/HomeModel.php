<?php
    class homeModel{
        public $conn;
        function __construct(){
            $this->conn=connectdb();
        }

        function allProduct(){
            $sql="select * from products order by id desc";
            return $this->conn->query($sql);
        }
        function allCate(){
            $sql="select * from categories";
            return $this->conn->query($sql);
        }

        function findCate($id){
            $sql="select * from danhmuc where id_dm=$id";
            return $this->conn->query($sql)->fetch();
        }
        function getProductsByCategory($id_dm){
            $sql = "SELECT * FROM products WHERE category_id = $id_dm";
            return $this->conn->query($sql);
        }

        // select sản phẩm
        function findProduct($id){
                $sql="select * from products where id=$id";
                return $this->conn->query($sql)->fetch();
        }
        // select sản phẩm giỏ hàng
        function findProductByIds($carts_id_str){

            $sql="SELECT * FROM products WHERE id IN ($carts_id_str)";;
            return $this->conn->query($sql);
        }

        function findUserByID($id){
            $sql = "SELECT * FROM users WHERE id = $id";
            return $this->conn->query($sql);
        }



        // kiểm tra login
        function checkAcc($username, $password){
            // $password=sha1($password);
            $sql="select * from users where username='$username' and password='$password'";
            return $this->conn->query($sql)->rowCount();
        }

        function getProductscomment($id){

            $sql = "SELECT comments.*, users.username 
            FROM comments 
            JOIN users ON comments.user_id = users.id 
            WHERE comments.product_id = $id";

            // $sql = "SELECT * FROM comments WHERE id= $id";
            return $this->conn->query($sql);
        }
    
        function insertComment($user_id, $content, $product_id) {
            $sql = "INSERT INTO comments (user_id, content, product_id) VALUES (:user_id, :content, :product_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT); // Gán user_id
            $stmt->bindParam(':content', $content, PDO::PARAM_STR); // Gán nội dung bình luận
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT); // Gán product_id
            return $stmt->execute(); // Thực thi truy vấn
        }

}

?>