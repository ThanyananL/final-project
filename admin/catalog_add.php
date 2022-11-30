<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'catalog.php';

if ($_POST['catalog_add']) {

	$catalog_name = function_teeth($_POST['catalog_name']);
	$catalog_detail = function_teeth($_POST['catalog_detail']);

	$catalog_page = rand();
	$catalog_add = "INSERT INTO `catalog` (`catalog_page`,`catalog_name`, `catalog_detail`) VALUES ('$catalog_page','$catalog_name','$catalog_detail') ";
	$catalog_Reult = mysqli_query($con,$catalog_add);

	$_SESSION[catalog_id] = mysqli_insert_id($con);
	if (!$catalog_Reult) {
		echo"<script>alert(' เกิดข้อผิดพลาด catalog_add '); window.history.back(); </script>";
	}
	if ($catalog_Reult) {
		if($_FILES['catalog_photo']['name']!=''){
			$suffix = strrchr($_FILES["catalog_photo"]["name"],".");
			$catalog_photo = rand().$suffix;
			$upload = move_uploaded_file($_FILES["catalog_photo"]["tmp_name"],"../cloud/catalog_photo/".$catalog_photo);
			$catalog_photo_Update = "UPDATE `catalog` SET `catalog_photo` = '$catalog_photo' WHERE `catalog_id` = '$_SESSION[catalog_id]'";
			$catalog_photo_Reult = mysqli_query($con,$catalog_photo_Update);
			$table =  'catalog';
			min_resize($catalog_photo,$table);
		}
		echo"<script>  window.location='catalog_one.php?INSERT'; </script>";
	}	
}

?>

<!DOCTYPE html>
<html>
<head>
	<? include 'index_Head.php'; ?>
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
						<h3>  เพิ่ม    หมวดหมู่      </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="catalog.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "   หมวดหมู่   " ที่ต้องการเพิ่ม
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" > รูป    หมวดหมู่    <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input Type="file" class="form-control"  name="catalog_photo"  required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ชื่อ   หมวดหมู่     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="catalog_name" type="text" class="form-control"  name="catalog_name"  required  maxlength="80" placeholder="ความยาวไม่เกิน 80  ตัวอักษร" >
										</div>
										<label class="control-label col-md-3 text-left" > <span id="catalog_name_chars" class="text-muted">  </span>  </label>
										<script type="text/javascript">
											var catalog_name = 80;
											$('#catalog_name').keyup(function() {
												var length = $(this).val().length;
												var length = catalog_name-length;
												$('#catalog_name_chars').text(length);
											});
										</script>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รายละเอียดเบื้องต้น </label>
										<div class="col-md-6">
											<textarea id="catalog_detail" class="form-control" rows="4" name="catalog_detail"  maxlength="250" placeholder="รายละเอียดแนะนำ สั้นๆ ความยาวไม่เกิน 250  ตัวอักษร"></textarea>
										</div>
										<label class="control-label col-md-2 text-left" > <span id="catalog_detail_chars"  class="text-muted">  </span>  </label>
										<script type="text/javascript">
											var catalog_detail = 250;
											$('#catalog_detail').keyup(function() {
												var length = $(this).val().length;
												var length = catalog_detail-length;
												$('#catalog_detail_chars').text(length);
											});
										</script>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-3 col-md-6">
											<button Type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input Type="hidden" name="catalog_add" value="x">
										</div>
									</div>
								</div>
							</div>
						</form>
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


