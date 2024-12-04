<?php


// Kiểm tra trạng thái đăng nhập
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>
            if (confirm('Bạn cần đăng nhập để sử dụng chức năng này!')) {
                window.location.href = '?act=login'; 
            } else {
                window.location.href = '/TGMoblie'; // Quay lại trang chủ
            }
          </script>";
    exit; 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/css/style.css">
    <link rel="stylesheet" href="view/css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>
    
</head>
<body>
    
    <!-- <div class="product-container"> -->
           <?php require './view/layout/header.php' ?>
           <form action="" class="form-buy-cart" method="post" onsubmit="return validateForm()">
           <div class="content">
           <div class="listcart">
           <?php if(!empty($products)):?>
           <?php
           
           $total = 0;
            foreach ($products as $product): ?>
                <?php
                // Lấy số lượng từ mảng carts tương ứng với product_id
                $quantity = 0;
               
                foreach ($carts as $cart) {
                    if ($cart['id'] == $product['id']) {
                        $quantity = $cart['quantity'];
                        break;
                    }
                }
                
                $total += $product['price_sale'] * $quantity;
                ?>
                
                <div class="cart-item">
                <div class="box box-items0">
                    <input type="checkbox" name="product_id[]" value="<?php echo $product['id']; ?>"  style="height: 20px; width:20px;">
                </div>
                <div class="box box-items1">
                    <h4 style="margin-left: 10px;"><?php echo $product['name_product']; ?></h4>
                    <img style="height: 80px;" src="view/img/<?php echo $product['image']; ?>" alt="">
                </div>
                <div class="box box-items2">
                   <h4>Giá</h4>
                   <h4><?=number_format($product['price_sale'], 0, ',', '.') . " VNĐ"?></h4>
                </div>
                <div class="box box-items3">
                    <h4>Số lượng</h4>
                    <h4><?php echo $quantity; ?></h4>
                </div>
                <div class="box box-items3">
                    <h4>Tổng giá</h4>
                   <h4><?=number_format($product['price_sale'] * $quantity, 0, ',', '.') . " VNĐ"?> </h4> 
                </div>
                <div class="box">
                <a href="?act=removeCart&product_id=<?php echo $product['id']; ?>" class="delete-btn" style="color: black;">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
                </div>
             </div>
            <?php endforeach; ?>
            <div class="cart-total">
            <h3 style="text-align: right; color:#ca0000;">Tổng tiền: <?=number_format($total, 0, ',', '.') . " VNĐ"?></h3>
            </div>
            <?php else : ?>
                <h2>Giỏ hàng trống</h2>
            <?php endif; ?>

            </div>
            <div class="form-buy">
                <div class="title-text" style="text-align: center;">
                <h2 >Thông tin đặt hàng</h2>
               </div>
               
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']?>">
                <input type="text" id="full_name" name="full_name" placeholder="Họ và tên" class="ip-address" value="">
                <span id="error_full_name" class="error-message" style="color: red;"></span>
                <input type="email" id="email" name="email" placeholder="email" class="ip-address" value="<?php echo $_SESSION['email'] ?>">
                <span id="error_email" class="error-message" style="color: red;"></span>
                <input type="text" id="phone" name="phone" placeholder="số điện thoại" class="ip-address" value="<?php echo $_SESSION['phone'] ?>">
                <span id="error_phone" class="error-message" style="color: red;"></span>
                <h3>Hình thức thanh toán</h3>
                <div class="setbuy">
                    <input type="radio" checked >
                    Thanh toán khi nhận hàng
                </div>
                <h3>Địa chỉ nhận hàng</h3>
                <textarea name="address" id="address"></textarea>
                <span id="error_address" class="error-message" style="color: red;"></span>
                <button type="submit" class="btn-buy" name="btn-buy">Xác nhận đặt hàng</button>
                <div class="router">
                <div class="back">
                <i class="fa-solid fa-arrow-left"></i>
                <a href="/TGMoblie"><p>Tiếp tục mua hàng</p></a>
                </div>
                <div class="pre">
                <a href="?act=carthistory"><p>Lịch sử mua hàng</p></a>
                <i class="fa-solid fa-arrow-right"></i>
                </div>
                </div>
               </div> 
            </div>
           </div>
           </form>
            <!-- Product List -->
            

<!-- </div> -->

 <?php
require_once "./view/layout/footer.php"
?> 


<script src="./view/js/validate.js"></script>
</body>
</html>


 