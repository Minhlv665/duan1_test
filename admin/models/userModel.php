<?php
class accModel{
    public $conn;
    function __construct(){
        $this->conn=connectdb();
    }
    // function checkAcc($username, $password,){
    //     $sql="select * from users where username='$username' and password='$password'";
    //     // var_dump($sql);
    //     return $this->conn->query($sql)->rowCount();
    // }

    function getacc($id){
        $sql="select * from users where id=$id";
        return $this->conn->query($sql)->fetch();
    }
    
    
    public function deleteUser($id) {
        $sql = "UPDATE users SET isdelete = 1 WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    function checkAcc($username, $password) {
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $this->conn->prepare($sql); // Sử dụng prepared statement để tăng tính bảo mật
        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về thông tin tài khoản dưới dạng mảng kết hợp
    }
    
    function getAllacc(){
        $sql="select * from users where isdelete='0'";
        return $this->conn->query($sql);
    }

    function insertacc($user,$pass){
        $sql = "INSERT INTO acc (user, pass) VALUES (:user, :pass)";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':pass', $pass);
        return $stmt->execute();

    }



    function getUserByUserName($username){
        $sql="select * from users where username='$username'";
        $data = $this->conn->query($sql)->fetch();
        return $data;
    }


    

}
?>