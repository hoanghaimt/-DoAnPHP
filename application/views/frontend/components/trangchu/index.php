<section id="menu-slider"> 
   <div class="slider">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 list-menu pull-left">
                <?php $this->load->view('frontend/modules/category'); ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 slider-main pull-left">
                <?php 
                    $this->load->view('frontend/modules/slider');
                ?>
            </div>
            <!-- <div class="col-md-2 col-lg-2 hidden-xs hidden-sm pull-right ads-right">
                <div class="ads-top">
                    <a href=""><img src="style/images/right-banner-1.jpg"></a>
                </div>
                <div class="ads-bottom">
                    <a href=""><img src="style/images/right-banner-2.jpg"></a>
                </div>
            </div> -->
        </div>
    </div>

 <div class="services">
        <div class="container">
            <div class="col-xs-12 cp;-sm-12 col-md-4 col-lg-4 item">
                <div class="img-service">
                    <img src="public/images/ship.png" class="pull-left">
                </div>
                <div class="text-img">
                    <h4 class="pull-left clear-fix">Miễn phí vận chuyển</h4>
                    <p>Dành cho đơn hàng hơn 200.000đ</p>
                </div>
            </div>
            <div class="col-xs-12 cp;-sm-12 col-md-4 col-lg-4 item">
                <div class="img-service">
                    <img src="public/images/sale.jpg" class="pull-left">
                </div>
                <div class="text-img">
                    <h4 class="pull-left">Chiết khấu 20%</h4>
                    <p>Dành cho những đơn hàng hơn </p>
                </div>
            </div>
            <div class="col-xs-12 cp;-sm-12 col-md-4 col-lg-4 item">
                <div class="img-service">
                    <img height="83%" src="public/images/hotro2.jpg" class="pull-left">
                </div>
                <div class="text-img">
                    <h4 class="pull-left">Hỗ trợ 24/7</h4>
                    <p>Gọi ngay nếu bạn cần hỗ trợ</p>
                </div>
            </div>
        </div>
    </div>
</section>
    <section id="banner">
    <div class="container">
        <div class="banner">
            <div class="item-banner">
                <a href="">
                    <img src="public/images/salel2.jpg">
                </a>
            </div> 
            <div class="item-banner">
                <a href="">
                    <img src="public/images/salel3.jpg">
                </a>
            </div>
            <div class="item-banner">
                <a href="">
                    <img  src="public/images/salel5.jpg">
                </a>
            </div>
            
        </div>
    </div>
</section>
<div class="container" style="margin-top: 20px;">
    <div class="sale-title">
        <span class="bg">SẢN PHẨM KHUYẾN MÃI HOT</span>
    </div>
</div>
<div class="container" style="margin-bottom: 10px;">
    <div class="owl-carousel owl-carousel-product owl-theme" style="border: 1px solid #FCC52B;">
        <?php 
        $product_sale = $this->Mproduct->product_sale(10);
        foreach ($product_sale as $row) :?>

            <div class="item" style="margin: 0px;">
                <div class="products-sale">
                    <div class="lt-product-group-image"> 
                        <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>" >
                            <img style="height: 230px" class="img-p"src="public/images/products/<?php echo $row['avatar'] ?>" alt="">
                           
                        </a>

                        <?php if($row['sale'] > 0) :?>
                            <div class="sale-flash">
                                <span class="text-giam-percent">-<?php echo $row['sale'] ?>%</span>
                            </div>
                        <?php endif; ?>
                          
                    </div>
                    <div class="lt-product-group-info">
                        <h4 class="namesp">                        
                            <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>" class="ws-nw overflow ellipsis">
                                            <?php echo $row['name'] ?>
                       
                        </a></h4>

                        <div class="price-product-item">
                            <?php if($row['sale'] > 0) :?>

                               
                                    <span class="price"><?php echo(number_format($row['price'])); ?>₫</span>
                                
                              
                                    <span class="price"><?php echo(number_format($row['price_sale'])); ?>₫</span>
                              
                                <?php else: ?>
                                
                                    <span class="price" ><?php echo(number_format($row['price'])); ?>₫</span>
                                
                                    <span class="price"><?php echo(number_format($row['price'])); ?>₫</span>
                               

                            <?php endif;?>
                             <div class="hidenitem">
                                 <a href="<?php echo $row['alias'] ?>">
                                <p class="iconstar"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fa fa-star"></i></p>
                              
                                <p class="trangthai"> <?php if($row['number'] - $row['number_buy']==0 || $row['status'] == 0) echo 'Hết hàng'; else echo 'Còn hàng' ?></p>
                                </a>
                             </div>
                        </div>
                          
                        <div class="clear"></div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="container" style="margin-top: 20px;">
    <div class="sale-title">
        <span class="bg">SẢN PHẨM BÁN CHẠY</span>
    </div>
</div>
<div class="container" style="margin-bottom: 20px;">
    <div class="owl-carousel owl-carousel-product owl-theme" style="border: 1px solid #FCC52B;">
        <?php 
        $product_sale = $this->Mproduct->product_selling(10); 
        foreach ($product_sale as $row) :?>
            <div class="item" style="margin: 0px;">
                <div class="products-sale">
                    <div class="lt-product-group-image" >
                        <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>" >
                            <img style="height: 230px" class="img-p"src="public/images/products/<?php echo $row['avatar'] ?>" alt="">
                         
                        </a>
                        <?php if($row['sale'] > 0) :?>
                            <div class="sale-flash">
                                <span class="text-giam-percent">-<?php echo $row['sale'] ?>%</span>
                            </div>
                        <?php endif; ?>
                         
                    </div>
                    <div class="lt-product-group-info">
                         <h4 class="namesp">                        
                            <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>" class="ws-nw overflow ellipsis">
                                            <?php echo $row['name'] ?>
                       
                        </a></h4>
                        <div class="price-product-item">
                            <?php if($row['sale'] > 0) :?>

                               
                                    <span class="price"><?php echo(number_format($row['price'])); ?>₫</span>
                                
                                    <span class="price"><?php echo(number_format($row['price_sale'])); ?>₫</span>
                            
                                <?php else: ?>
                              
                                    <span class="price" ><?php echo(number_format($row['price'])); ?>₫</span>
                             
                                    <span class="price"><?php echo(number_format($row['price'])); ?>₫</span>
                             
                            <?php endif;?>
                            <div class="hidenitem">
                                 <a href="<?php echo $row['alias'] ?>">
                                <p class="iconstar"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></p>
                              
                                <p class="trangthai"> <?php if($row['number'] - $row['number_buy']==0 || $row['status'] == 0) echo 'Hết hàng'; else echo 'Còn hàng' ?></p>
                                </a>
                             </div>
                        </div>
                           
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</section>

<section id="content">
    <div class="container">
        <?php 
        $listCategory=$this->Mcategory->category_list(0,'10');
        foreach ($listCategory as $rowCategory):
            // row dien thoai
            $subCategory=$this->Mcategory->category_list($rowCategory['id'],'10');
            // Id dien thoai
            $catId=$this->Mcategory->category_id($rowCategory['link']);
            // list id dt ss, apple,...
            $listCatId=$this->Mcategory->category_listcat($catId);
            // list dt ss, apple
            $listProducts=$this->Mproduct->product_home_limit($listCatId,10);
            if((count($listProducts) >= 3)):?>
                <div class="list-product">
                    <div class="list-header-z">
                        <h2><a href="<?php echo  $rowCategory['link']?>"><?php echo  $rowCategory['name']?> nổi bật</a></h2>
                        <ul class="sub-category">
                            <?php foreach ($subCategory as $rowSubCategory) :?>
                                <li>
                                    <a href="san-pham/<?php echo $rowSubCategory['link'] ?>" 
                                        title="<?php echo $rowSubCategory['name'] ?>"
                                        class="ws-nw overflow ellipsis"
                                        >
                                        <?php echo $rowSubCategory['name'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="list-product-content">
                        <?php foreach ($listProducts as $sp) :?>
                            <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 product-one">
                                <div class="image-product" style="height: 200px">
                                        <a href="<?php echo $sp['alias'] ?>" title="<?php echo $sp['name'] ?>" >
                                            <img src="public/images/products/<?php echo $sp['avatar'] ?>" class="img-bg">
                                           <!--  <span class="text-tra-gop-0"><i class="fas fa-bolt"></i> Trả góp 0%</span> -->
                                        </a>

                                       
                                        <h4 style="font-weight: bold;">
                                            <a href="<?php echo $sp['alias'] ?>" title="<?php echo $sp['name'] ?>" class="ws-nw overflow ellipsis">
                                            <?php echo $sp['name'] ?>
                                        </a>
                                        </h4>
                                         
                                    </div>

                                     <div class="price-product-item">
                                        
                                        
                                        <?php if($sp['sale'] > 0) :?>
                                            <span class="price"><?php echo(number_format($sp['price'])); ?>₫</span>
                                           
                                            <span class="price"><?php echo(number_format($sp['price_sale'])); ?>₫</span>
                                          
                                            <?php else: ?>
                                           
                                            <span class="price" ><?php echo(number_format($sp['price'])); ?>₫</span>                                                
                                            <span class="price"><?php echo(number_format($sp['price'])); ?>₫</span> 
                                        <?php endif;?>
                                    </div>
                                          <?php if($sp['sale'] > 0) :?>
                                            <div class="sale-flash">
                                               <?php echo $sp['sale'] ?>%
                                            </div>
                                        <?php endif; ?> 
                                     <div class="btn-action">
                                        <button type="button" class="fa fa-shopping-cart" onclick="onAddCart(<?php echo $sp['id']  ?>)"></button>
                                        <a  href="<?php echo $row['alias'] ?>"><button type="button" class="fa fa-eye"></button></a>
                                    </div>
                                 </div>
                                        
                        <?php endforeach;?>
                    </div>

          
                     <div class="footer-load-more">
                        <a href="san-pham/<?php echo $rowSubCategory['link'] ?>"><p class="text-center">Xem thêm</p></a>
                    </div>
                </div>
            <?php endif;?>
        <?php endforeach;?>
    </div>
</section>
<section class="home-blog">
    <div class="container">
        <div class="title-line">
            <h2 class="title" style="color: #ff9800">Tin tức</h2>
        </div>
        <div class="blog-content">
            <?php  
            $listBaiViet=$this->Mcontent->content_list_home(4, 'all');
            foreach ($listBaiViet as $rowPost) :?>
               <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 margin-bot-6">
                    <div class="post-grid clearfix">
                        <div class="entry-thumb width50 pull-left">
                             <a href="tin-tuc/<?php echo $rowPost['alias'] ?>">
                            
                                <img width="70%" height="180px" src="public/images/posts/<?php echo $rowPost['img'] ?>">
                            </a>
                        </div>
                        <div class="entry-content width50 pull-left padding-10">
                            <div class="entry-meta">
                                 <h4><a href="tin-tuc/<?php echo $rowPost['alias'] ?>"><?php echo $rowPost['title'] ?></a></h4>
                                <p>Đăng lúc <?php echo $rowPost['created'] ?></p>
                            </div>
                            <div class="entry-desc">
                                    <div class="intro-text" style="max-height: 54px; overflow: hidden;">
                                        <?php echo $rowPost['introtext'] ?>
                                    </div>
                                    <a href="tin-tuc/<?php echo $rowPost['alias'] ?>" class="read-more">Đọc thêm →</a>
                            </div>
                        </div>
            </div>
            </div>
            <?php endforeach; ?>
            <div class="zalo-chat-widget" data-oaid="2983646200108513843" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="300" data-height="300"></div>

<script src="https://sp.zalo.me/plugins/sdk.js"></script>
           <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.125052042533!2d106.71230301430725!3d10.801733161680902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a500e8c3d5%3A0xedfca63e47b5afb8!2zNDc1YSDEkGnhu4duIEJpw6puIFBo4bunLCBQaMaw4budbmcgMjUsIELDrG5oIFRo4bqhbmgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCA3MDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1637756313190!5m2!1svi!2s" width="1200" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
        </div>
    </div>
</section>


    <script>

                function onAddCart(id){
                    var strurl="<?php echo base_url();?>"+'/sanpham/addcart';
                    jQuery.ajax({
                        url: strurl,
                        type: 'POST',
                        dataType: 'json',
                        data: {id: id},
                        success: function(data) {
                            document.location.reload(true);
                            alert('Thêm sản phẩm vào giỏ hàng thành công !');
                        }
                    });
                }
            </script>
