<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-picture"></i> Danh mục loại sản phẩm</h1>
		<div class="breadcrumb">
			<?php
			if($user['role']==1){
				echo '<a class="btn btn-primary btn-sm" href="'.base_url().'admin/category/insert" role="button">
				<span class="glyphicon glyphicon-plus"></span> Thêm mới
				</a>';
				}else{
			echo '<span style="color:red"> Không đủ quyền </span>';
			}
			?>
			<a class="btn btn-primary btn-sm" href="admin/category/recyclebin" role="button">
				<span class="glyphicon glyphicon-trash"></span> Thùng rác (<?php $total=$this->Mcategory->category_trash_count(); echo $total; ?>)
			</a>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box" id="view">
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
											<th>Tên loại sản phẩm</th>
											<th>Danh mục cha</th>
											<th>Ngày tạo</th>
											<th class="text-center">Trạng thái</th>
											<th class="text-center" colspan="2">Thao tác</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($list as $row):?>
											<tr>
												<td class="text-center"><?php echo $row['id'] ?></td>
												<td>
													<a href="<?php echo base_url() ?>admin/category/update/<?php echo $row['id'] ?>"><?php echo $row['name'] ?>
													(<?php $total=$this->Mproduct->product_count_parentid($row['id']); echo $total; ?>)
												</a>	
											</td>
											<td>
												<?php  
												$catid = $this->Mcategory->category_parentid($row['id']);
												$name = $this->Mcategory->category_name_parent($catid);
												if($catid == 0)
												{
													echo "";
												}
												else
												{
													echo $name;
												}
												?>
											</td>
											<td class="text-center">
												<?php echo $row['created_at'] ?>
											</td>
											<td class="text-center">
												<a href="<?php echo base_url() ?>admin/category/status/<?php echo $row['id'] ?>">
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
															echo '<a class="btn btn-success btn-xs" href="'.base_url().'admin/category/update/'.$row['id'].'" role = "button">
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
															echo '<a class="btn btn-danger btn-xs" href="'.base_url().'admin/category/trash/'.$row['id'].'" role = "button">
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