<?php echo form_open_multipart('admin/contact/detail/'.$row['id']); ?>

<div class="content-wrapper">
	<form action="<?php echo base_url() ?>admin/content/update.html" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-text-background"></i> Chi tiết </h1>
			<div class="breadcrumb">
				
				<a class="btn btn-primary btn-sm" href="admin/contact" role="button">
					<span class="glyphicon glyphicon-remove do_nos"></span> Thoát
				</a>
			</div>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box" id="view">
						<div class="box-body">
							<div class="col-md-12">
							<?php echo validation_errors(); ?>
							<table class="table">
								<tbody>
									<tr>
										<td>Họ và tên:</td>
										<td style="color: blue;"> <?php echo $row['fullname'] ?></td>
											 
									</tr>

									<tr>
										<td>SDT:</td>
										<td style="color: blue;"> <?php echo $row['phone'] ?></td>
											 
									</tr>
										<tr>
										<td>Email:</td>
										<td style="color: blue;"> <?php echo $row['email'] ?></td>
											 
									</tr>
										<tr>
										<td>Tiêu đề:</td>
										<td style="color: blue;"><?php echo $row['title'] ?></td>
											 
									</tr>
										<tr>
										<td>Nội dung :</td>
										<td style="color: blue;"> <?php echo $row['content'] ?></td>
											 
									</tr>

								</tbody>
							</table>
							
								
								
								
							
						</div>
					</div><!-- /.box -->
				</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
	</form>
<!-- /.content -->
</div><!-- /.content-wrapper -->