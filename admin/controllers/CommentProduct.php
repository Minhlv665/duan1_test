<?php
include 'CommentModel.php';

class CommentController {
    private $model;

    public function __construct() {
        $this->model = new CommentModel();
    }

    // Thêm bình luận
    public function addComment($product_id, $comment) {
        return $this->model->addComment($product_id, $comment);
    }

    // Hiển thị tất cả bình luận của sản phẩm
    public function getComments($product_id) {
        return $this->model->getCommentsByProductId($product_id);
    }

    // Cập nhật bình luận
    public function updateComment($comment_id, $new_comment) {
        return $this->model->updateComment($comment_id, $new_comment);
    }

    // Xóa bình luận
    public function deleteComment($comment_id) {
        return $this->model->deleteComment($comment_id);
    }
}
?>
