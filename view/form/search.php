<div class="featured__phone__product__list">
            <?php foreach($products as $value) { ?>
                       <!-- 1st -->
                       <div class="featured__phone__product__item">
                           <!--  Discount -->
                        <div class="flash__sale__discount">
                            <p>Giảm 18%</p>
                        </div>
                       <div class="featured__phone__product__img__wrapper">
                           <a href="?act=product_detail&id=<?php echo $value['id'] ?>"><img src="../admin/view/<?php echo $value['image'] ?>" alt=""></a>
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