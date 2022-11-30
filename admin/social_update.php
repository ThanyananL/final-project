<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'social.php';

if (isset($_GET[social_id])){
	$_SESSION[social_id] =  $_GET[social_id];
}
$social_id =   $_SESSION[social_id] ;

$social_SL = " SELECT * FROM social WHERE social_id = '$social_id'";
$social_QR = mysqli_query($con,$social_SL);
$social 	= mysqli_fetch_array($social_QR);

if ($_POST['social_Update']) {
	
	$social_name = $_POST['social_name'];
	$social_type = $_POST['social_type'];
	
	$social_link = $_POST['social_link'];
	$social_link= str_replace("'","&#39;",$social_link);
	$social_link= str_replace("\"","&quot;",$social_link);
	$social_link= str_replace("http://","",$social_link);
	$social_link= str_replace("https://","",$social_link);

	$social_Update = "UPDATE `social` SET `social_name` = '$social_name',`social_link` = '$social_link',`social_type` = '$social_type' WHERE `social_id` = '$social_id'";
	$social_Reult = mysqli_query($con,$social_Update);

	if (!$social_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}

	if($_FILES['social_photo']['name']!=''){

		
		@unlink("../cloud/social_photo/".$social['social_photo']);
		$Jpg = strrchr($_FILES["social_photo"]["name"],".");
		$social_photo = rand()." ".rand().$Jpg;
		$upload = move_uploaded_file($_FILES["social_photo"]["tmp_name"],"../cloud/social_photo/".$social_photo);
		$social_photo_Update = "UPDATE `social` SET `social_photo` = '$social_photo' WHERE `social_id` = '$social_id'";
		$social_photo_Reult = mysqli_query($con,$social_photo_Update);
	}
	
	if ($social_Reult) {
		echo"<script>   window.location='social.php?UPDATE'; </script>";
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
						<h3>  แก้ไข ติดต่อสอบถาม : <span class="text-primary bold"> <?php echo $social[social_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="social.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								กรอกรายละเอียด "ติดต่อสอบถาม"  ที่ต้องการแก้ไข
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-md-2" >ข้อมูล <span class="text-red"> * </span></label>
										<div class="col-md-5">
											<input value="<? echo $social[social_name]; ?>" type="text" class="form-control" required name="social_name"  placeholder=" 0848313986 , LINE @NAME">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >ประเภท <span class="text-red"> * </span></label>
										<div class="col-md-5">
											<input  value="<? echo $social[social_type]; ?>"   type="text" class="form-control" title="กรอกคำว่า Tel จะสามารถกดโทรได้" required name="social_type"  placeholder=" Tel , Line , Facebook ">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >ลิ้ง </label>
										<div class="col-md-5">
											<input value="<? echo $social[social_link]; ?>" type="text" class="form-control"  name="social_link"  placeholder="www.facebook.com  , 0899999999 " title="ไม่ต้องกรอกก็ได้">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >รูป  </label>
										<div class="col-md-5">
											<input type="file" class="form-control br2" name="social_photo"  placeholder="" title="แก้ไขรูป">
										</div>
										<label class="control-label col-md-2 text-left text-red" >  รูปใหม่ที่ต้องการนำมาแทน  </label>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-2 col-md-5">
											<button onclick="return confirm('ยืนยันการแก้ไขข้อมูล ? ')" type="submit"  class="btn btn-info">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
											<input type="hidden" name="social_Update" value="x">
										</div>
									</div>
								</form>
							</div>
							<div class="panel-footer">
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


