<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-user"></i> Danh sách khách hàng</h1>
		<div class="breadcrumb">

			
			<?php
			if($user['role']==1){
				echo '<a class="btn btn-primary btn-sm" href="'.base_url().'admin/customer/insert" role="button">
				<span class="glyphicon glyphicon-plus"></span> Khách hàng vip
				</a>';
				}else{
			echo '<span style="color:red"> Không đủ quyền </span>';
			}
			?>	
		</div>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box" id="view">
					<div class="box-header with-border">
					<!-- /.box-header -->
					<div class="box-body">
						<?php  if($this->session->flashdata('success')):?>
	                        <div class="row">
	                            <div class="alert alert-success">
	                                <?php echo $this->session->flashdata('success'); ?>
	                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                            </div>
	                        </div>
	                    <?php  endif;?>
	                    <?php  if($this->session->flashdata('error')):?>
	                        <div class="row">
	                            <div class="alert alert-error">
	                                <?php echo $this->session->flashdata('error'); ?>
	                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                            </div>
	                        </div>
	                    <?php  endif;?>

						<div class="row" style='padding:0px; margin:0px;'>
							<!--ND-->
							<div class="table-responsive">
								<table class="table table-hover table-bordered">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th>Tên khách hàng</th>
											<th>Email</th>
											<th>Điện thoại</th>
											<!-- <th>Trạng thái</th> -->
											<th class="text-center" colspan="2">Thao tác</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($list as $row):?>
										<tr>
											<td class="text-center"><?php echo $row['id'] ?></td>
											<td><?php echo $row['fullname'] ?></td>
											<td><?php 
											if($row['email']){
												echo $row['email'];
											}else{
												echo 'Khách vãng lai';
											}
											 ?></td>
											<td><?php echo $row['phone'] ?></td>
											<!-- <td class="text-center">
												<a href="<?php echo base_url() ?>admin/customer/status/<?php echo $row['id'] ?>">
													<?php if($row['status']==1):?>
														<span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
													<?php else: ?>
														<span class="glyphicon glyphicon-remove-circle maudo"></span>
													<?php endif; ?>
												</a>
											</td> -->
											<td class="text-center">
												<a class="btn btn-info btn-xs" href="<?php echo base_url() ?>admin/customer/update/<?php echo $row['id'] ?>" role = "button">
													<span class="glyphicon glyphicon-edit"></span>Xem
												</a>
											</td>
											
										</tr>

									<?php endforeach; ?>
									</tbody>
								</table>
								

							</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<ul class="pagination">
										<?php echo $strphantrang ?>
									</ul>
								</div>
							</div>
							<!-- /.ND -->
						</div>
					</div><!-- ./box-body -->
				</div><!-- /.box -->
			</div>
		<!-- /.col -->
	  	</div>
	  <!-- /.row -->
	</section>
</div>