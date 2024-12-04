<?php
class orderModel
{
    public $conn;
    function __construct()
    {
        $this->conn = connectdb();
    }

    function listOrder()
    {
        $sql = "select * from orders";
        return $this->conn->query($sql);
    }
    function getOrder($id)
    {
        $sql = "select * from orders where id = $id";
        return $this->conn->query($sql)->fetch();
    }

    function showOrderDetail($id)
    {
        $sql = "SELECT  order_details.*, products.image, products.name_product FROM order_details JOIN products ON order_details.product_id = products.id WHERE order_details.order_id = $id;";
        return $this->conn->query($sql);
    }

    public function updateStatus($id, $status) {
        // Danh sách giá trị hợp lệ
        $validStatuses = ['pending', 'processing', 'completed', 'cancel'];
    
        // Kiểm tra giá trị truyền vào có hợp lệ không
        if (!in_array($status, $validStatuses)) {
            throw new Exception("Giá trị status không hợp lệ: $status");
        }
    
        // Thực thi câu lệnh SQL
        $sql = "UPDATE orders SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
}
