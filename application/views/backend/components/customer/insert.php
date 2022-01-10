<?php echo form_open_multipart('admin/customer/insert'); ?>
<div class="content-wrapper">
	<form action="<?php echo base_url() ?>admin/customer/insert.html" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-text-background"></i> Khách hàng thân quen</h1>
			<div class="breadcrumb">
				<a class="btn btn-primary btn-sm" href="https://mail.google.com/mail/u/1/#inbox?compose=new" target="_blank" role="button">
					<span class="glyphicon glyphicon-remove do_nos"></span> Gửi Email
				</a>
				<a class="btn btn-primary btn-sm" href="admin/customer" role="button">
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
								  <h1><i class="glyphicon glyphicon-user"></i> Danh sách khách hàng thân quen</h1><br>
								<table class="table table-hover table-bordered">		
								</table>
								<table class="table table-hover table-bordered">
									
									<tbody>
										<p id="copy">	
									<?php foreach ($list as $row):?>
																				
											<?php 											
												echo $row['email'].',';
										
											 ?>											
									<?php endforeach; ?>
										</p>
									<button onclick="copyToClipboard('#copy')" >Copy</button>
									</tbody>
								</table>
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
<script type="text/javascript">
	
	function copyToClipboard(element) {
var $temp = $("<input>");
$("body").append($temp);
$temp.val($(element).html()).select();
document.execCommand("copy");
$temp.remove();
}
</script>