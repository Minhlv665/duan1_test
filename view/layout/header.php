
<!-- < ?php
session_start();
?>  -->
<?php 
    $listcate=$this->homeModel->allCate();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/css/style.css">
    <link rel="stylesheet" href="./view/css/product.css">
    <link rel="stylesheet" href="./view/font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./view/font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Trang chủ</title>
</head>
<body>
    <!-- Nội dung HTML tiếp theo -->

<nav>
    <div class="logo">
        <img src="./view/img/th__1_-removebg-preview.png" alt="logo" width="60px" height="60px">
    </div>
    <div class="fad-menu">
    <div class="search">
        <form action="?act=search" method="POST">
            <input type="search" name="search" placeholder="Tìm kiếm sản phẩm....">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="menu">
        <ul>
            <li><ion-icon class="icon-menu" name="home-outline"></ion-icon><a href="?act=home" class="cach">Trang chủ</a></li>
            <li><ion-icon class="icon-menu" name="call-outline"></ion-icon><a href="" class="cach">Liên hệ</a></li>
            <li><ion-icon class="icon-menu" name="help-circle-outline"></ion-icon><a href="" class="cach">Hỗ trợ</a></li>
            <li><ion-icon class="icon-menu" name="cart-outline"></ion-icon><a href="" class="cach">Giỏ hàng</a></li>
            <li class="menu-item">
                <ion-icon .icon-menu name="person-outline"></ion-icon><a href="#">Tài khoản</a>
                <div class="dropdown-menu">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '<a href="#">Xin chào, ' . htmlspecialchars($_SESSION['email']) . '</a>';
                        echo '<a href="?act=logout">Đăng xuất</a>';
                    } else {
                        echo '<a href="?act=login">Đăng nhập</a>';
                    }
                    ?>
                </div>
            </li>
        </ul>
    </div>
    </div>
</nav>

<header class="navbar">
    <div class="form-logo">
        <?php foreach ($listcate as $key => $row) { ?>
            <div class="logoicon">
                <img src="./view/img/<?php echo $row['image_cate']; ?>" alt="">
            </div>
    <?php } ?>
        </div>
</header>
<!-- <div class="slide-show">
    <div class="list-img">
        <div class="item">
            <img src="./view/img/slide4.png" alt="">
        </div>
        <div class="item">
            <img src="./view/img/slide6.png" alt="">
        </div>
        <div class="item">
            <img src="./view/img/slide2.jpg" alt="">
        </div>
        <div class="item">
            <img src="./view/img/slide3.jpg" alt="">
        </div>
    </div>
    <div class="btn">
        <button id="prev"><ion-icon name="arrow-back-outline"></ion-icon></button>
        <button id="next"><ion-icon name="arrow-forward-outline"></ion-icon></button>
    </div>
</div>
<div class="fad-image">
<div class="image-row">
    <img src="./view/img/banner-sale1.jpg" alt="">
    <img src="./view/img/banner-sale3.png" alt="">
    <img src="./view/img/banner-sale4.jpg" alt="">
    <img src="./view/img/banner-sale5.jpg" alt="">
</div>
</div>
<script src="../other/view/js/banner.js"></script> -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

