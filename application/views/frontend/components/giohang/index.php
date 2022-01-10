<div class="row content-cart">
	<div class="container">
		<?php if($this->session->userdata('cart')):
			$cart = $this->session->userdata('cart');
			?>
			<form action="" method="post" id="cartformpage">
				<div class="cart-index">
				<div class="checkout-header _block bg-pri hidden-xs">
                    <div class="checkout-header _container">
                        <a href="#" class="checkout-header _logo">
                            <!-- <h1 class="color-fff">24hStore</h1> -->
                        </a>
                        <div class="checkout-header _progress-bar">
                            <ol class="step-breadcrumb _list">
                                <li class="step-breadcrumb _item -current">
                                    <span class="step-breadcrumb _text">Đặt hàng</span>
                                </li>
                                <li class="step-breadcrumb _item">
                                    <span class="step-breadcrumb _text">Thanh toán</span>
                                </li>
                                <li class="step-breadcrumb _item">
                                    <span class="step-breadcrumb _text">Kết quả</span>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
					<div class="tbody text-center">
						<div class="col-xs-12 col-12 col-sm-12 col-md-8 col-lg-8">

							<table class="table table-list-product">

								<thead>
									<tr style="background: #f3f3f3;">
										<th>Hình ảnh</th>
										<th>Tên sản phẩm</th>
										<th class="text-center">Đơn giá</th>
										<th class="text-center">Số lượng</th>
										<!-- <th class="text-center">Số lượng kho còn</th> -->
										<th class="text-center">Thành tiền</th>
										<th class="text-center">Xóa</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($cart as $key => $value) :
										$row = $this->Mproduct->product_detail_id($key);
										?>
										<tr>
											<td class="img-product-cart">
												<a href="<?php echo $row['alias'] ?>">
													<img src="public/images/products/<?php echo $row['avatar'] ?>" alt="<?php echo $row['name'] ?>">

												</a>
											</td>
											<td style="width: 280px">
												<a href="<?php echo $row['alias'] ?>" class="pull-left"><?php echo $row['name'] ?></a>
											</td>
											<td>
												<span class="amount">
													<?php 
													if($row['price_sale'] > 0){
														echo (number_format($row['price_sale'])).' đ';
													}else{
														echo (number_format($row['price'])).' đ';
													}
													?>
												</span>
											</td>
											<td> 
												<div class="quantity clearfix">

													<input name="quantity" id="<?php echo $row['id'] ?>" class="form-control" type="number" value="<?php echo $value ?>" min="1" max="<?php echo ($row['number'] - $row['number_buy'])?>" onchange="onChangeSL(<?php echo $row['id'] ?>)">
													
												</div>
											</td>
											<!-- <td>
												<p style="color: blue"> <?php echo ($row['number'] - $row['number_buy'])?> </p>
											</td> -->
											<td>
												<span class="amount">
													<?php 
													if($row['price_sale'] > 0){
														echo (number_format($row['price_sale']*$value)).' đ';
													}else{
														echo (number_format($row['price'] * $value)).' đ';
													}
													?>
												</span>
											</td>
											<td>
												<a class="remove" title="Xóa" onclick="onRemoveProduct(<?php echo $row['id']; ?>)"><i class="fas fa-trash-alt"></i></a>
											</td>
										</tr>
									<?php endforeach; ?> 
								</tbody>
							</table>
							<button class="btn" onclick="window.location.href='san-pham'"> <a href="<?php echo base_url() ?>san-pham">Tiếp tục mua hàng</a></button>
						</div>
						<?php $total = 0; ?>
						<?php foreach ($cart as $key => $value) : 
							$row = $this->Mproduct->product_detail_id($key);?>
							<?php
							if($row['price_sale'] > 0)
								$sum = $row['price_sale'] * $value;
							else
								$sum = $row['price'] * $value;
							$total += $sum;
							?>	
						<?php endforeach; ?>
						<div class="col-xs-12 col-sm-12 col-md-4">
							<div class="clearfix btn-submit" style="padding-left: 10px;margin-top: 20px;">
								<table class="table total-price" style="border: 1px solid #ececec;">
									<tbody>
										<tr style="background: #f4f4f4;">
											<td>Tổng tiền</td>
											<td><strong><?php echo (number_format($total)).' VNĐ'; ?></strong></td>
										</tr>
										<tr>
											<td colspan="2"><h5>Mua hàng trực tiếp tại cửa hàng giảm giá 5%</h5></td>
										</tr>
										<tr>
											<td colspan="2"><h5>Nếu đặt online Bạn hãy đồng ý với điều khoản sử dụng & hướng dẫn hoàn trả.</h5></td>
										</tr>
										 
										<tr>

											<td colspan="2">
												<button type="button" onclick="window.location.href='info-order'" class="btn-next-checkout">Đặt hàng</button>
											</td>
										</tr>
									</tbody>
								</table>

							</div>
						</div>
					</div>

				</div>

			</form>
			<?php else: ?>
				<div class="cart-info">
					Bạn chưa có sản phẩm nào trong kho hàng !
					<br>	
					<button class="btn" onclick="window.location.href='san-pham'"> Tiếp tục mua hàng</button>
				</div>

			<?php endif;?>
		</div>
	</div>
	<script>
		function onChangeSL(id){
		
			var sl = document.getElementById(id).value;
			var strurl="<?php echo base_url();?>"+'/sanpham/update';
			jQuery.ajax({
				url: strurl,
				type: 'POST',
				dataType: 'json',
				data: {id: id, sl:sl},
				success: function(data) {
				   if(data.quantityError) {
					document.location.reload(true);
					return alert("Số lượng trong kho không đủ !");
				   }
					if(data.error) {
						document.location.reload(true);
						return alert("Số lượng phải lớn hơn 0 !");
					}
					document.location.reload(true);
				}
			});
		}
		function onRemoveProduct(id){
			var strurl="<?php echo base_url();?>"+'/sanpham/remove';
			jQuery.ajax({
				url: strurl,
				type: 'POST',
				dataType: 'json',
				data: {id: id},
				success: function(data) {
					document.location.reload(true);
					alert('Xóa sản phẩm thành công !!');
				}
			});
		}
	</script>