


    <!-- <div class="product-container"> -->
           <?php require './view/layout/header.php' ?>
            
            <?php require './view/layout/banner.php' ?>
            <!-- Product List -->
             <div class="title-dm">
             <i class="fa-solid fa-bolt" style="font-size: 25px; margin-right: 20px;"></i>
             <h2><?=$cateOne['name']?></h2>
             </div>
            <div class="featured__phone__product__list">
            <?php foreach($productsByCategory as $key => $value) { ?>
                       <!-- 1st -->
                       <div class="featured__phone__product__item">
                           <!--  Discount -->
                        <div class="flash__sale__discount">
                            <p>Giảm 18%</p>
                        </div>
                       <div class="featured__phone__product__img__wrapper">
                           <a href="?act=detail&id=<?=$value['id']?>"><img src="./view/img/<?php echo $value['image'] ?>" alt=""></a>
                       </div>    
                       <div class="featured__phone__product__desc">
                           <div class="featured__phone__product__desc__title">
                               <a href="" class="featured__phone__product">
                               <?php echo $value['name_product'] ?>
                               </a>
                           </div>
                           <div class="coming__soon">
                                   
                            </div>
                            <div class="featured__phone__product__desc__price">
                                <div class="featured__phone__product__desc__price__new">
                                    <p>
                                        <?=number_format($value['price'], 0, ',', '.') . " đ"?>
                                        <span class="featured__phone__product__desc__price__unit__new">đ</span>                                  
                                    </p>
                                </div>
                            </div>
                           <div class="featured__phone__product__desc__rare featured__phone__rare">
                               <div class="featured__phone__product__desc__rare__star">
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                               </div>
                               <div class="featured__phone__product__desc__rare__vote">
                                   <p>&nbsp;9 đánh giá</p>
                               </div>
                           </div>
                       </div>
                       </div>
                       <?php } ?>

                       </div>

<!-- </div> -->

<?php
require_once "./view/layout/footer.php"
?>



 