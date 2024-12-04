<?php
require_once 'models/orderModel.php';
class oderController
{
    public $orderModel;
    function __construct()
    {
        $this->orderModel = new orderModel();
    }


    function listOrder()
    {
        $showOrder = $this->orderModel->listOrder();
        require_once 'views/listorder.php';
    }

    function orderDetail($id)
    {
        
        $order = $this->orderModel->getOrder($id);
        $orderProducts = $this->orderModel->showOrderDetail($id);
        if (isset($_POST['submit_update'])) {
            $status = trim($_POST['status']); // Loại bỏ khoảng trắng
            var_dump($status); // Kiểm tra giá trị truyền vào
            if ($this->orderModel->updateStatus($id, $status)) {
                header("Location: ?act=listorder");
                exit;
            } else {
                echo "Lỗi khi cập nhật trạng thái đơn hàng.";
            }
        }
        
        require_once 'views/detailOrder.php';
} 


}