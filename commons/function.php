<?php
    function connectdb(){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=du_an_mau;charset=utf8","root","");
            return $conn;
        }
        catch(\Throwable $th){
            echo "Lỗi kết nối";
        }
    }
?>