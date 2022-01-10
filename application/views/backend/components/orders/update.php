<?php echo form_open_multipart('admin/orders/update/'.$row['id']); ?>
<div class="content-wrapper">
	<form action="<?php echo base_url() ?>admin/orders/update.html" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-text-background"></i> Ghi chú đơn hàng</h1>
			<div class="breadcrumb">
				<button type = "submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Cập nhật]
				</button>
				<a class="btn btn-primary btn-sm" href="admin/orders" role="button">
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
							<div class="col-md-9">
								
								
								<div class="form-group">
									<label>Ghi chú đơn hàng<span class = "maudo">(*)</span></label>
									<textarea name="cmt" id="cmt" class="form-control"><?php echo $row['cmt'] ?></textarea>
      								<script>CKEDITOR.replace('cmt');</script>
      								<div class="error" id="cmt" style="color: red"><?php echo form_error('cmt')?></div>
								</div>
							</div>
							
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