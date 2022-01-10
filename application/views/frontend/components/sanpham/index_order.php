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
                       <img src="public/images/products/<?php echo $row['avatar'] ?>" alt=""  class="img-bg">
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
            <div class = "text-center pull-right">
                <ul class ="pagination">
                    <?php echo $strphantrang; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>