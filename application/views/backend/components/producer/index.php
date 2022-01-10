<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-gift"></i> Danh sách nhà cung cấp</h1>
		<div class="breadcrumb">
			
			<?php
			if($user['role']==1){
				echo '<a class="btn btn-primary btn-sm" href="'.base_url().'admin/producer/insert" role="button">
				<span class="glyphicon glyphicon-plus"></span> Thêm mới
				</a>';
				}else{
			echo '<span style="color:red"> Không đủ quyền </span>';
			}
			?>
			<a class="btn btn-primary btn-sm" href="<?php echo base_url()?>admin/producer/recyclebin" role="button">
				<span class="glyphicon glyphicon-trash"></span> Thùng rác(<?php $total=$this->Mproducer->producer_trash_count(); echo $total; ?>)
			</a>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box" id="view">
					<div class="box-header with-border">
						<!-- /.box-header -->
						<?php  if($this->session->userdata('message')):?>
							<div class="alert alert-success">
								<?php echo $this->session->userdata('message'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
							</div>
						<?php endif; ?>
						<div class="box-body">
							<?php  if($this->session->flashdata('success')):?>
								<div class="row">
									<div class="alert alert-success">
										<?php echo $this->session->flashdata('success'); ?>
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
												<th class="text-center" style="width:20px">ID</th>
												<th class="text-center">Code</th>
												<th class="text-center">Name</th>
												<th class="text-center">Keyword</th>
												<th class="text-center">Trạng thái</th>
												<th class="text-center" colspan="2">Thao tác</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($list as $row):?>
												<tr>
													<td class="text-center"><?php echo $row['id'] ?></td>
													<td><?php echo $row['code'] ?></td>
													<td><?php echo $row['name'] ?></td>
													<td><?php echo $row['keyword'] ?></td>
													<td class="text-center">
														<a href="<?php echo base_url() ?>admin/producer/status/<?php echo $row['id'] ?>">
															<?php if($row['status']==1):?>
																<span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
																<?php else: ?>
																	<span class="glyphicon glyphicon-remove-circle maudo"></span>
																<?php endif; ?>
															</a>
														</td>
														<td class="text-center">
														<?php
														if($user['role']==1){
															echo '<a class="btn btn-success btn-xs" href="'.base_url().'admin/producer/update/'.$row['id'].'" role = "button">
															<span class="glyphicon glyphicon-edit"></span>Cập nhật
														</a>';
														}else{
															echo '<p class="fa fa-lock" style="color:red"> Không thể sửa</p>';
														}
														?>
														</td>
														
														<td class="text-center">
														<?php
														if($user['role']==1){
															echo '<a class="btn btn-danger btn-xs" href="'.base_url().'admin/producer/trash/'.$row['id'].'" role = "button">
																		<span class="glyphicon glyphicon-trash"></span> Xóa
																	</a>';
														}else{
															echo '<p class="fa fa-lock" style="color:red"> Không thể xóa </p>';
														}
														?>
															
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
			<!-- /.content -->
</div><!-- /.content-wrapper -->