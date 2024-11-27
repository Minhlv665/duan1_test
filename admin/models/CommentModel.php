<?php
class CommentModel {
    private $pdo;

    public function __construct() {
        // Cấu hình kết nối cơ sở dữ liệu MySQL
        $host = 'localhost'; 
        $dbname = 'du_an_1'; 
        $username = 'root'; 
        $password = ''; 

        try {
            // Tạo kết nối PDO
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Kết nối thất bại: ' . $e->getMessage();
            exit();
        }
    }

    // Thêm bình luận
    public function addComment($product_id, $comment) {
        $stmt = $this->pdo->prepare("INSERT INTO comments (product_id, comment) VALUES (:product_id, :comment)");
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':comment', $comment);
        return $stmt->execute();
    }

    // Lấy tất cả bình luận của một sản phẩm
    public function getCommentsByProductId($product_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE product_id = :product_id ORDER BY created_at DESC");
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cập nhật bình luận
    public function updateComment($comment_id, $new_comment) {
        $stmt = $this->pdo->prepare("UPDATE comments SET comment = :comment, updated_at = CURRENT_TIMESTAMP WHERE id = :id");
        $stmt->bindParam(':comment', $new_comment);
        $stmt->bindParam(':id', $comment_id);
        return $stmt->execute();
    }

    // Xóa bình luận
    public function deleteComment($comment_id) {
        $stmt = $this->pdo->prepare("DELETE FROM comments WHERE id = :id");
        $stmt->bindParam(':id', $comment_id);
        return $stmt->execute();
    }
}
?>
