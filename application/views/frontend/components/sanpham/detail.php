

<section id="product-detail">
	<div class="container">
		<div class="products-wrap">
			<form action="" method="post" id="ProductDetailsForm">
				<?php if($row):?>
					<div class="breadcrumbs">
						<ul>
							
							<li class="category3">
								<a href="<?php echo base_url() ?>/san-pham/<?php $link=$this->Mcategory->category_link($row['catid']); echo $link; ?>" title=""><?php $name=$this->Mcategory->category_name($row['catid']); echo $name; ?></a>
								
							</li>
							
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 listimg-desc-product">
						<?php $this->load->view('frontend/modules/jcarousel');?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="product-view-content">
							<div class="product-view-name">
								<h1><?php echo $row['name'] ?></h1>
							</div>
							<div class="product-view-price">
								<div class="pull-left">
									<span class="price-label">Giá bán:</span>
									<span class="price"><?php echo number_format($row['price'])?>₫</span>
								</div>
								<?php if($row['price_sale']>0&&$row['sale']>0): ?>
									<div class="product-view-price-old">
										<span class="price"><?php echo $row['price_sale'] ?>₫</span>
										<span class="sale-flag">-<?php echo $row['sale'] ?>%</span>
									</div>
								<?php endif; ?>
							</div>
							<div class="product-status">
								<p style=" float: left;margin-right: 10px;">Thương hiệu: <?php $name=$this->Mcategory->category_name($row['catid']); echo $name; ?></p>
								<p>| Tình trạng: <?php if($row['number']==0) echo 'Hết hàng'; else echo 'Còn hàng' ?></p>
							</div>
							<div class="product-view-desc">
								<h4>Mô tả:</h4>
								<p><?php echo $row['sortDesc'] ?></p>
							</div>
							<div class="actions-qty">
								<label for="qty">Số lượng</label>
								<input type="number" class="input-text qtyDetail" title="Qty" value="1" min="1" maxlength="<?php echo ($row['number'] - $row['number_buy'])?>" id="qtyDetail" name="quantity">

									
									<button class="button btn-cart add_to_cart_detail detail-button" title="Mua ngay" aria-label="Mua ngay" data-id="<?php echo $row['id']  ?>" ><span><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua ngay</span></button>
									<buttion class="hotline detail-hotline" aria-label="Hotline" title="Holine: 08.62632424" onclick="window.location.href='tel:0123456789'"><i class="fa fa-volume-control-phone" aria-hidden="true"></i> 0971293148</buttion>
								</div>
							</div>
							<div class="product-view-payments">
								<label>Chấp nhận thanh toán</label>
								<img src="public/images/baokim.png">
								<img src="public/images/vietcombank.png">
								<!-- <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FMini-Maket-682007328642205%2F&width=450&layout=standard&action=like&show_faces=false&share=true&height=35&appId" width="450" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
								<div class="g-plusone" data-annotation="inline" data-width="300"></div> -->
							</div>
						</div>
					</div>
					<div class="product-v-desc col-md-12 col-12 col-xs-12">
						<h3>Đặc điểm nổi bật</h3>
						<?php echo $row['detail']?>
					</div>
					<div class="product-comment product-v-desc">
						<h3>Bình luận</h3>
						<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">

							<div class="fb-comments" data-href="<?php echo base_url() ?><?php echo $row['alias'] ?>" data-numposts="20"></div>	
						</div>
						
					</div>
					<div class="product-comment product-v-desc product">
						<h3>Sản phẩm liên quan</h3>
						<?php
						$list_spcungloai = $this->Mproduct->product_cungloai($row['catid'], $row['id'], 5);?>
						<?php 
						if(count($list_spcungloai)>0):?>
							<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 product-similar-wrap">
									<?php foreach ($list_spcungloai as $sp) :?>
										 <div class="item col-md-2 col-sm-2 col-xs-6 product-one">
                                 		   <div class="image-product">
													<a href="<?php echo $sp['alias'] ?>" title="<?php echo $sp['name'] ?>" >

														<img class="img-bg" src="public/images/products/<?php echo $sp['avatar'] ?>" alt="">
													</a>

													<h4>
														<a href="<?php echo $sp['alias'] ?>" title="<?php echo $sp['name'] ?>" style="text-align: left;">
														<?php echo $sp['name'] ?>
													</a>
													</h4>
													
												</div>

												 <div class="price-product-item">
													
												
														<?php if($sp['sale'] > 0) :?>

															
																<span class="price"><?php echo(number_format($sp['price'])); ?>₫</span>
															
																<span class="price"><?php echo(number_format($sp['price_sale'])); ?>₫</span>
															
															<?php else: ?>
																
																	<span class="price" style="color: #fff"><?php echo(number_format($sp['price'])); ?>₫</span>
																
																	<span class="price"><?php echo(number_format($sp['price'])); ?>₫</span>
																
															<?php endif;?>
														</div>

														<?php if($sp['sale'] > 0) :?>
														<div class="giam-percent">
															<span class="text-giam-percent">-<?php echo $sp['sale'] ?>%</span>
														</div>
													<?php endif; ?>
													 <div class="btn-action">
			                                            <button type="button" class="fa fa-shopping-cart" onclick="onAddCart(<?php echo $sp['id']  ?>)"></button>
			                                            <button type="button" class="fa fa-eye"></button>
			                                        </div>
													
												
											</div>
										<?php endforeach; ?>
									</div>
									<?php else: ?>
										<h4>Chưa có sản phẩm cùng loại</h4>
									<?php endif; ?>
								</div>
							<?php endif; ?>	
						</form>

					</div>
				</div>
			</section>
			<script>

				
				$('.add_to_cart_detail').click(function(e) {
					e.preventDefault();
					var strurl="<?php echo base_url();?>"+'/sanpham/addcart';
					jQuery.ajax({
						url: strurl,
						type: 'POST',
						dataType: 'json',
						data: {id: $(this).attr('data-id'), quantity : $("#qtyDetail").val()},
						success: function(data) {
							if(data.error) {
								alert("Số lượng trong kho không đủ !");
								$('.qtyDetail').val(1)
								return;
							}
							alert('Thêm sản phẩm vào giỏ hàng thành công !');
							return	document.location.reload(true);
						}
					});
				})

				$('.qtyDetail').change(function(e) {
					if(e.target.value <= 0) {
						$(this).val(1)
					}
				})
			</script>
