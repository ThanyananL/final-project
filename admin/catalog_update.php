<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'catalog.php';

if (isset($_GET[catalog_id])){
	$_SESSION[catalog_id] =  $_GET[catalog_id];
}
$catalog_id =   $_SESSION[catalog_id] ;

$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$catalog_id'";
$catalog_QR = mysqli_query($con,$catalog_SL);
$catalog 	= mysqli_fetch_array($catalog_QR);

if ($_POST['catalogUpdate']) {

	$catalog_name = function_teeth($_POST['catalog_name']);
	$catalog_detail = function_teeth($_POST['catalog_detail']);

	$catalog_Update = "UPDATE `catalog` SET 
	`catalog_name` = '$catalog_name',
	`catalog_detail` = '$catalog_detail' WHERE `catalog_id` = '$catalog_id'";
	$catalog_Reult = mysqli_query($con,$catalog_Update);

	if (!$catalog_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด catalog_Reult'); window.history.back(); </script>";
	}

	if($_FILES['catalog_photo']['name']!=''){
		@unlink("../cloud/catalog_photo/".$catalog['catalog_photo']);
		@unlink("../cloud/catalog_min/".$catalog['catalog_photo']);
		$suffix = strrchr($_FILES["catalog_photo"]["name"],".");
		$catalog_photo = rand().$suffix;
		$upload = move_uploaded_file($_FILES["catalog_photo"]["tmp_name"],"../cloud/catalog_photo/".$catalog_photo);
		$catalog_photo_Update = "UPDATE `catalog` SET `catalog_photo` = '$catalog_photo' WHERE `catalog_id` = '$_SESSION[catalog_id]'";
		$catalog_photo_Reult = mysqli_query($con,$catalog_photo_Update);
		$table =  'catalog';
		min_resize($catalog_photo,$table);
	}

	if ($catalog_Reult) {
		echo"<script>   window.location='catalog_one.php?UPDATE'; </script>";
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
						<h3>  แก้ไข     หมวดหมู่   : <span class="text-primary bold"> <?php echo $catalog[catalog_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="catalog_one.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด " หมวดหมู่ " ที่ต้องการแก้ไข
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" > ชื่อ หมวดหมู่ <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="catalog_name" type="text" class="form-control" value="<? echo $catalog[catalog_name]; ?>" name="catalog_name"  required  maxlength="80" placeholder="ความยาวไม่เกิน 80  ตัวอักษร" >
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
											<textarea id="catalog_detail" class="form-control" rows="4" name="catalog_detail"  maxlength="250" placeholder="รายละเอียดแนะนำ สั้นๆ ความยาวไม่เกิน 250  ตัวอักษร"><? echo $catalog[catalog_detail]; ?></textarea>
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
										<label class="control-label col-md-3" > รูป   </label>
										<div class="col-md-6">
											<input type="file"  class="form-control"  name="catalog_photo">
										</div>
										<label class="control-label col-md-3 text-left" >
											รูปที่จะนำมาแทนรูปเดิม
										</label>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-3 col-md-6">
											<button onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit"  class="btn btn-info">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
											<input type="hidden" name="catalogUpdate" value="x">
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


