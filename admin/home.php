<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'home.php';

if ($_POST['pagecontent_update']) {

	$pagecontent_review_eng = $_POST['pagecontent_review_eng'];
	$pagecontent_review = $_POST['pagecontent_review'];
	$pagecontent_id = $_POST['pagecontent_id'];

	$pagecontent_Update = "UPDATE `pagecontent` SET  `pagecontent_review_eng` = '$pagecontent_review_eng', `pagecontent_review` = '$pagecontent_review'  WHERE `pagecontent_id` = '$pagecontent_id'";
	$pagecontent_Reult = mysqli_query($con,$pagecontent_Update);
	if($pagecontent_Reult) {
		echo"<script>  window.location='home.php?UPDATE'; </script>";
	}
	else{
		echo"<script>alert('Content_Reult'); window.history.back(); </script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<? include 'index_Head.php'; ?>
	<style type="text/css">
		@media (min-width:991px){
			.modal-lg {
				width: 80%;
			}
		}
	</style>
</head>
<body>
	<? include 'index_Navbar.php'; ?>	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2" id="main-left">
				<div class="row">
					<div class="col-md-12">
						<? include 'index_AdminMenu.php'; ?>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						<h3> จัดการ รายละเอียดแนะนำ </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12">
						<?
						$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'Home'";
						$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
						$pagecontent 	= mysqli_fetch_array($pagecontent_QR);
						?>
						<button  type="button" class="btn btn-info" 	data-toggle="modal" data-target="#pagecontent_update<?php echo $pagecontent[pagecontent_id]; ?>">
							<span class="glyphicon glyphicon-edit"></span>
							แก้ไข
						</button> 
					</div>
					<div class="col-md-12 top-margin2">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row" >
									<div class="col-md-12">
										รายละเอียดแนะนำ   	
									</div>
								</div>
							</div>
							<div class="panel-body">
								<? echo $pagecontent[pagecontent_review]; ?>
							</div>
						</div>
						<div id="pagecontent_update<?php echo $pagecontent[pagecontent_id]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<form action="" method="post" encType="multipart/form-data">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="exampleModalLabel"> แก้ไข   
												<span class="text-primary">
													รายละเอียดแนะนำ  
												</span>
											</h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<textarea name="pagecontent_review" class="ckeditor"><? echo $pagecontent[pagecontent_review]; ?></textarea>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-info">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
											<input Type="hidden" name="pagecontent_update" value="x">
											<input Type="hidden" name="pagecontent_id" value="<?php echo $pagecontent[pagecontent_id]; ?>">
											<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- 12 -->
				</div>
				<!-- row -->
			</div>
			<!-- 10 -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</body>
</html>


