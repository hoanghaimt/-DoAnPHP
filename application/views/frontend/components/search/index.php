<section id="product-all" class="collection">
    <div class="banner-product">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 banner-left">
               <img src="public/images/banners/banner4.jpg">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 banner-right">
                <img src="public/images/banners/banner11.jpg">
            </div>
        </div>
    </div>
    <div class="slider">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 list-menu pull-left">
                    <?php $this->load->view('frontend/modules/category'); ?>
                </div>
                <?php $this->load->view('frontend/modules/product-sale'); ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 product-content">
               <div class="product-wrap">
                    <div class="collection__title">
                    <h1><span>Tất cả sản phẩm</span></h1>
                    <div class="collection-filter" id = "list-product">
                        <div class="category-products clearfix">
                            <div class="products-grid clearfix">
                            <?php if(count($list)==0): ?>
                                <p>Không có sản phẩm !</p>
                            <?php else : ?>
                                <?php foreach ($list as $row) :?>
                                    <div class="item col-md-3 col-sm-3 col-xs-6 product-one">
                                        <div class="image-product">
                                        <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>">
                                            <img src="public/images/products/<?php echo $row['avatar'] ?>" alt="" class="img-bg">
                                            <!-- <div class="img-bg" style="background: url(public/images/products/<?php echo $row['avatar'] ?>);">
                                            </div> -->
                                        </a>
                                        <h4>
                                            <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>" class="ws-nw overflow ellipsis"><?php echo $row['name'] ?></a>
                                        </h4>
                                    </div>
                                    <div class="price-product-item">
                                        <?php if($row['sale'] > 0) :?>
                                            <span class=""><?php echo(number_format($row['price_sale'])); ?>₫</span>
                                            <span><?php echo(number_format($row['price'])); ?>₫</span>
                                        <?php else: ?>
                                            <span class=""><?php echo(number_format($row['price'])); ?>₫</span>
                                            <span style="color: #fff"><?php echo(number_format($row['price'])); ?>₫</span>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($row['sale'] > 0) :?>
                                        <div class="sale-flash">
                                            -<?php echo $row['sale'] ?>%
                                        </div>
                                    <?php endif; ?>
                                    <div class="btn-action">
                                        <button type="button" class="fa fa-shopping-cart" onclick="onAddCart(<?php echo $row['id']  ?>)"></button>
                                        <button type="button" class="fa fa-eye"></button>
                                    </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                                <!-- <div class = "text-center pull-right">
                                    <ul class ="pagination">
                                        <?php echo $strphantrang; ?>
                                    </ul>
                                </div> -->
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
               </div>
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
    function sortby(option){
        var strurl="<?php echo base_url();?>"+'/sanpham/index';
        jQuery.ajax({
            url: strurl,
            type: 'POST',
            dataType: 'json',
            data: {'sapxep': option},
            success: function(data) {
                $('#list-product').html(data);
            }
        });
    }
</script>
