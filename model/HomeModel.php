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
}

?>