<section id="product-all" class="collection">
    <div class="banner-product">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                <img src="public/images/poster.jpg">
            </div>
        </div>
    </div>
    <div class="slider">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="list-menu pull-left col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php $this->load->view('frontend/modules/category'); ?>
                </div>
                <?php $this->load->view('frontend/modules/product-sale'); ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 product-content">
               <div class="product-wrap">
                    <div class="collection__title">
                    <h1><span><?php echo $categoryname ?></span></h1>
                    <!-- <div class="sorter">
                        <div class="view-mode"> 
                            <span title="Lưới" class="view-mode-button button-active button-grid"><i class="fa fa-th" aria-hidden="true"></i></span>
                            <a href="?view=list" title="Danh sách" class="view-mode-button button-list"><i class="fa fa-th-list" aria-hidden="true"></i></a> 
                        </div>
                    </div> -->
                    <div id="sort-by" class="hidden-xs">
                        <label class="left hidden-xs" for="sort-select">Sắp xếp theo: </label>
                        <form class="form-inline form-viewpro">
                            <div class="form-group">
                        <?php 
                            $html_list="";
                            $html_list.='<select id ="sortControl" class = "sort-by form-control input-sm" onchange="sortby(this.value)">';
                            if($this->session->userdata('sortby')){
                                $data = $this->session->userdata('sortby');
                                $sort = $data[0].'-'.$data[1];
                                if($sort == 'number_buy-desc'){
                                    $html_list.='<option value="number_buy-desc" selected>Bán chạy nhất</option>';
                                }else{
                                    $html_list.='<option value="number_buy-desc">Bán chạy nhất</option>';
                                }
                                if($sort == 'name-asc'){
                                    $html_list.='<option value="name-asc" selected>A → Z</option>';
                                }else{
                                    $html_list.='<option value="name-asc" >A → Z</option>';
                                }
                                if($sort == 'name-desc'){
                                    $html_list.='<option value="name-desc" selected>Z → A</option>';
                                }else{
                                    $html_list.='<option value="name-desc">Z → A</option>';
                                }
                                if($sort == 'price-asc'){
                                    $html_list.='<option value="price-asc" selected>Giá tăng dần</option>';
                                }else{
                                    $html_list.='<option value="price-asc">Giá tăng dần</option>';
                                }
                                if($sort == 'price-desc'){
                                    $html_list.='<option value="price-desc" selected>Giá giảm dần</option>';
                                }else{
                                    $html_list.='<option value="price-desc">Giá giảm dần</option>';
                                }
                                if($sort == 'created-desc'){
                                    $html_list.='<option value="created-desc" selected>Hàng mới nhất</option>';
                                }else{
                                    $html_list.='<option value="created-desc">Hàng mới nhất</option>';
                                }
                                if($sort == 'created-asc'){
                                    $html_list.='<option value="created-asc" selected>Hàng cũ nhất</option>';
                                }else{
                                    $html_list.='<option value="created-asc">Hàng cũ nhất</option>';
                                }
                            }else{
                                $html_list.='<option value="number_buy-desc">Bán chạy nhất</option>';
                                $html_list.='<option value="name-asc">A → Z</option>';
                                $html_list.='<option value="name-desc">Z → A</option>';
                                $html_list.='<option value="price-asc">Giá tăng dần</option>';
                                $html_list.='<option value="price-desc">Giá giảm dần</option>';
                                $html_list.='<option value="created-desc">Hàng mới nhất</option>';
                                $html_list.='<option value="created-desc">Hàng cũ nhất</option>';
                            }
                            $html_list.='</select>';
                            echo $html_list;
                        ?>
                        </div>
                        </form>
                    </div>
                    <div class="collection-filter" id = "list-product">
                        <div class="category-products clearfix">
                            <div class="products-grid clearfix">
                            <?php if(count($list)==0): ?>
                                <p class="no-products"> Danh mục hiện chưa có sản phẩm nào !</p>
                            <?php else : ?>
                                <?php foreach ($list as $row) :?>
                                    <div class="item col-md-3 col-sm-3 col-xs-6 product-one">
                                        <div class="image-product">
                                            <a href="<?php echo $row['alias'] ?>" title="<?php echo $row['name'] ?>">
                                    <img src="public/images/products/<?php echo $row['avatar'] ?>" class="img-bg">
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
                                            <button type="button" class="fa fa-eye""></button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                                <div class = "text-center pull-right">
                                    <ul class ="pagination">
                                        <?php echo $strphantrang; ?>
                                    </ul>
                                </div>
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
            data: {'sapxep-category': option},
            success: function(data) {
                $('#list-product').html(data);
            }
        });
    }
</script>