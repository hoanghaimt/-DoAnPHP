<div class="container order-page">
	<div class="general__title">
		<h2>Chi tiết đơn hàng</h2>
	</div>
	<div class="table-responsive">
		<fieldset>
			<table class="table table-bordered tb-detail-or">
				<thead>
					<tr class="">
						<th>Sản phẩm</th>
						<th>Giá</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
						
					</tr>
				</thead>
				<tbody>
					<?php foreach ($row as $value) :?>
						<tr>
							<td><a href="<?php echo $value['alias'] ?>"><?php echo $value['name'] ?></a></td>
							<td><?php echo number_format($value['priceorder']) ?> VNĐ</td>
							<td><?php echo $value['count'] ?></td>
							<td><?php echo number_format($value['priceorder']*$value['count']) ?> VNĐ</td>
							
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</fieldset>
	</div>
	<div class="or-detail-c">
		<div class="col-sm-8">
			<div class="general__title">
				<h3>Thông tin thanh toán</h3>
			</div>
			<div class="content-order">
				<table class="table">
					<tbody>
						<tr>
							
							<td> Trạng thái đơn hàng: </td>
							<td  style="padding-right: 200px"><span style="color: red" >
								<?php 
								 switch ($info['status']) {
								  case '0':
				                    echo 'Đang đợi duyệt';
				                    break;
				                    case '1':
				                    echo 'Đang giao hàng';
				                    break;
				                    case '2':
				                    echo 'Đã giao';
				                    break;
				                    case '3':
				                    echo 'Khách hàng đã hủy';
				                    break;
				                    case '4':
				                    echo 'Nhân viên đã hủy';
				                    break;
									}
								 	 $id = $info['id'];
				                ?>	
			                    </span></td>
						</tr>
						<tr>
							<td>Ghi chú đơn hàng:</td>
							<td style="color: blue;">
								  <?php echo $info['cmt']?></td>
						</tr>
						<tr>
							<td>Mã Đơn hàng:</td>
							<td><?php echo $info['orderCode'] ?></td>
						</tr>
						<tr>
							<td>Khách hàng:</td>
							<td><?php echo $info['fullname'] ?></td>
						</tr>
						<tr>
							<td>Số điện thoại:</td>
							<td> <?php echo $info['phone'] ?></td>
						</tr>
						<tr>
							<td>Thời gian đặt hàng:</td>
							<td><?php echo $info['orderdate'] ?></td>
						</tr>
						<tr>
							<td>Địa chỉ giao hàng:</td>
							<td><?php echo $info['address'] ?>, <?php echo $this->Mdistrict->district_name($info['district']); ?>, <?php echo $this->Mprovince->province_name($info['province']);?></td>
						</tr>
					</tbody>
				</table>
			</div>
			
		</div>
		<div class="col-sm-4">
			<div class="general__title">
				<h3>Tổng tiền hóa đơn</h3>
			</div>
			<div class="content-order">
				<table class="table">
					<tbody>
						<tr>
							<?php  
							$priceShip = $info['price_ship'];
							$total=$info['money'] - $info['price_ship'];
							?>
							<td> Tổng tiền đơn hàng </td>
							<td class="text-right"><span><?php echo number_format($total)?> VNĐ</span></td>
						</tr>
						
						<tr>
							<td>Phí giao hàng:</td>
							<td class="text-right"><?php echo number_format($priceShip) ?> VNĐ</span></td>
						</tr>
						<?php
						if($info['coupon'] != 0 ){
							echo '<tr>
							<td>Voucher :</td>
							<td class="text-right">-'.number_format($info['coupon']).' VNĐ</span></td>
						</tr>';
						}

						?>
						<tr>
							<td> Tổng thanh toán:</td>
							<td class="text-right"><span style="color: red; font-size: 23px;"><?php echo number_format($info['money']) ?> VNĐ</span></td>
						</tr>
						<tr>
												<td class="text-right" colspan="6">
													<a class="btn btn-primary btn-md" role="button" onclick="window.print()">
														<span class="glyphicon glyphicon-print"></span> In đơn hàng
													</a>
												</td>
											</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-xs-12">
			<button class="btn"><a href="javascript:;" onclick="window.history.go(-1);" class="viewMore pull-left" style="font-size: 15px;"><i class="fa fa-angle-left" aria-hidden="true"></i> Trở về trang trước</a></button>
		</div>
	</div>
</div>