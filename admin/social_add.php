<? 

include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'social.php';

if ($_POST['social_Add']) {
	
	$social_name = $_POST['social_name'];
	$social_type = $_POST['social_type'];

	$social_link = $_POST['social_link'];
	$social_link= str_replace("'","&#39;",$social_link);
	$social_link= str_replace("\"","&quot;",$social_link);
	$social_link= str_replace("http://","",$social_link);
	$social_link= str_replace("https://","",$social_link);

	$social_Add = "INSERT INTO `social` (`social_name`,`social_type`,`social_link`) 
	VALUES ('$social_name','$social_type','$social_link')";

	$social_Reult = mysqli_query($con,$social_Add);

	$social_id = mysqli_insert_id($con);

	if (!$social_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}

	if($_FILES['social_photo']['name']!=''){
		$Jpg = strrchr($_FILES["social_photo"]["name"],".");
		$social_photo = rand()." ".rand().$Jpg;
		$upload = move_uploaded_file($_FILES["social_photo"]["tmp_name"],"../cloud/social_photo/".$social_photo);
		$social_photo_Update = "UPDATE `social` SET `social_photo` = '$social_photo' WHERE `social_id` = '$social_id'";
		$social_photo_Reult = mysqli_query($con,$social_photo_Update);
	}

	if ($social_Reult) {
		echo"<script>  window.location='social.php?INSERT'; </script>";
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
						<h3>  เพิ่ม ติดต่อสอบถาม  </h3>
						<hr>
					</div>
				</div>

				<div class="row">

					<div class="col-md-12 br-margin2">
						<a href="social.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>

					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">

							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "ติดต่อสอบถาม"  ที่ต้องการเพิ่ม
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-2" > ข้อมูล	  <span class="text-red"> * </span> </label>
										<div class="col-md-5">
											<input type="text" class="form-control"  name="social_name"  placeholder=" 0848313986 , LINE @NAME" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > ประเภท <span class="text-red"> * </span> </label>
										<div class="col-md-5">
											<input type="text" title="หากเป็นเบอร์โทรศัพท์  ให้กรอกคำว่า Tel จะสามารถกดโทรได้"  class="form-control"  name="social_type"  placeholder=" Tel , Line , Facebook " required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > ลิ้ง </label>
										<div class="col-md-5">
											<input type="text" class="form-control"  name="social_link" placeholder="www.facebook.com  , 0899999999 "  title="หากเป็น Tel ให้ใส่เบอร์ห้ามเว้นวรรค">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" >รูป  </label>
										<div class="col-md-5">
											<input type="file" class="form-control br2" name="social_photo"  placeholder="" title="อัพเดทรูป">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" ></label>
										<div class="col-md-5">
											<button type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input type="hidden" name="social_Add" value="x">
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


