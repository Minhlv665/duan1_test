

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Sản Phẩm</title>
    <script src="./view/js/comment.js"></script>
    <link rel="stylesheet" href="./view/css/product.css">
    <link rel="stylesheet" href="./view/css/style.css">
</head>
<body>
   
    <?php if (isset($product) && !empty($product)) { ?>

        <div class="namebase">
            <h2><?=$product['name_product']?></h2>
        </div>
        <div class="base">


            <div class="box-item1">
                <div class="box-img">
                     <img src="./view/img/<?= $product['image']?>" alt="">
                </div>
                <div class="inside">
                    <h4>ƯU ĐÃI THANH TOÁN</h4>
                    <h5><i class="fa-solid fa-circle-check"></i>  Giảm 5% không giới hạn khuyến mãi qua Homepaylater</h5>
                    <h5><i class="fa-solid fa-circle-check"></i>  Giảm 1% tối đa 100.000đ (Áp dụng khi thanh toán 100% giá trị đơn hàng qua Zalopay)</h5>
                    <h4>ƯU ĐÃI ĐI KÈM</h4>
                    <h5><i class="fa-solid fa-circle-check"></i> Ưu đãi sốc gói truyền hình K+ chỉ từ 33.000đ/tháng khi mua kèm điện thoại, Máy tính bảng, TV tại Mega shop</h5>
                </div>
            </div>

            <div class="box-item2">
                <div class="item1">
                    <h4><i class="fa-solid fa-truck"></i> MIỄN PHÍ VẬN CHUYỂN TOÀN QUỐC</h4>
                </div>
                <div class="item2">
                    <h2><?=number_format($product['price'], 0, ',', '.') . " đ"?></h2>
                    <h4><i><del><?=number_format($product['price_sale'], 0, ',', '.')?></del></i> đ</h4>
                    <h4>| Giá đã bao gồm VAT</h4>
                </div>
                <div class="item3">
                    <div class="text-item">
                        <h3 style="color: #058b4c;">KHUYẾN MÃI</h3>
                        <h5>Tham gia thu cũ lên đời giảm thêm 250.000đ</h5>
                    </div>
                    <h4>Sku: <?=$product['name_product']?></h4>
                </div>
                <div class="item4">
                    <h3>THÔNG SỐ KỸ THUẬT</h3>
                    <h5></h5>
                </div>
                <div class="item5">
                    <div class="buy">
                        <h4>MUA NGAY</h4>
                        <h5>Giao tận nhà (COD)</h5>
                    </div>
                    <div class="add">
                        <i style="font-size: 30px;" class="fa-solid fa-cart-shopping"></i>
                        <h4>THÊM</h4>
                    </div>
                </div>
            </div>

            <div class="box-item3">
                <div class="setting">
                    <i class="fa-solid fa-gear"></i>
                    <h3>Thông số kỹ thuật</h3>
                </div>
                <table>
                    <tbody>
                      <tr>
                        <td>Số lượng</td>
                        <td><?=$product['description_1']?></td>
                      </tr>
                      <tr>
                        <td>Màn Hình</td>
                        <td><?=$product['description_2']?></td>
                      </tr>
                      <tr>
                        <td>Bộ nhớ trong</td>
                        <td><?=$product['description_3']?></td>
                      </tr>
                      <tr>
                        <td>Pin</td>
                        <td><?=$product['description_4']?></td>
                      </tr>
                      <tr>
                        <td>Hệ điều hành</td>
                        <td><?=$product['description_5']?></td>
                      </tr>
                      <tr>
                        <td>Loại CPU</td>
                        <td><?=$product['description_6']?></td>
                      </tr>
                      <tr>
                        <td>Loại CPU</td>
                        <td><?=$product['description_6']?></td>
                      </tr>
                      <tr>
                        <td>Loại CPU</td>
                        <td><?=$product['description_6']?></td>
                      </tr>
                      </tbody>
                </table>

                
            </div>
          

        </div>


<!-- comment form -->
        <div class="base">

            <div class="base1">
                <div class="text-comment">
                    <h3>Bình luận về sản phẩm</h3>
                </div>
                <div class="form-comment">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input class="comment" type="text" placeholder="Nội dung bình luận" name="content">
                        <button type="submit" name="btn_comment">Gửi bình luận</button>
                    </form>
                </div>
                <div class="show-comment">
                    <div class="taskform">
                        <?php foreach ($comments as $key => $row) { ?>
                            <div class="all">
                                <div class="fadsub">
                                    <div class="onsub">
                                        <div class="avt">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <h4><?= $row['username'] ?></h4>
                                    </div>
                                    <h4><?= $row['created_at'] ?></h4>
                                </div>
                                <h5><?= $row['content'] ?></h5>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        <?php
        
        ?>
        </div>

    <?php } 
    else { ?>
    <p>Sản phẩm không tồn tại.</p>
    <?php } ?>

</body>
</html>
