<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-cd"></i> Thùng rác danh mục sản phẩm</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="admin/category" role="button">
				<span class="glyphicon glyphicon-remove do_nos"></span> Thoát
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
						<div class="row" style='padding:0px; margin:0px;'>
							<!--ND-->
							<div class="table-responsive">
								<table class="table table-hover table-bordered">
									<thead>
										<tr>
											<th class="text-center" style="width:20px">ID</th>
											<th>Tên loại sản phẩm</th>
											<th>Đường dẫn</th>
											<th>Ngày đăng</th>
											<th>Người đăng</th>
											<th class="text-center" >Khôi phục</th>
											<th class="text-center">Xóa VV</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($list as $val): ?>
										<tr>
											<td class="text-center"><?php echo $val['id'] ?></td>
											<td>
												<a href="<?php echo base_url() ?>admin/category/update/<?php echo $val['id'] ?>"><?php echo $val['name'] ?></a>	
											</td>
											<td><?php echo $val['link'] ?></td>
											<td><?php echo $val['created_at'] ?></td>
											<td><?php $name=$this->Muser->user_name($val['created_by']); echo $name; ?></td>
											<td class="text-center">
												<a class="btn btn-success btn-xs" href="admin/category/restore/<?php echo $val['id'] ?>" role = "button">
													<span class="glyphicon glyphicon-edit"></span> Khôi phục
												</a>
											</td>
											<td class="text-center">
														<a class="btn btn-danger btn-xs" href="<?php echo base_url() ?>admin/category/delete/<?php echo $val['id'] ?>" onclick="return confirm('Xác nhận xóa ?')" role = "button">
															<span class="glyphicon glyphicon-trash"></span>Xóa VV	
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
<!-- /.content -->
</div><!-- /.content-wrapper -->