<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'slides.php';

if (isset($_GET[slides_id])){
	$_SESSION[slides_id] =  $_GET[slides_id];
}
$slides_id =   $_SESSION[slides_id] ;

$slides_SL = " SELECT * FROM slides WHERE slides_id = '$slides_id'";
$slides_QR = mysqli_query($con,$slides_SL);
$slides 	= mysqli_fetch_array($slides_QR);

if ($_POST['slidesUpdate']) {

	$slides_topic = trim($_POST['slides_topic']);
	$slides_topic = str_replace("'","&#39;",$slides_topic);
	$slides_topic = str_replace("\"","&quot;",$slides_topic);

	$slides_detail = trim($_POST['slides_detail']);
	$slides_detail = str_replace("'","&#39;",$slides_detail);
	$slides_detail = str_replace("\"","&quot;",$slides_detail);

	$slides_link = trim($_POST['slides_link']);
	$slides_link= str_replace("'","&#39;",$slides_link);
	$slides_link= str_replace("\"","&quot;",$slides_link);
	$slides_link= str_replace("http://","",$slides_link);
	$slides_link= str_replace("https://","",$slides_link);

	$slides_Update = "UPDATE `slides` SET `slides_link` = '$slides_link',`slides_topic` = '$slides_topic',`slides_detail` = '$slides_detail' WHERE `slides_id` = '$slides_id'";
	$slides_Reult = mysqli_query($con,$slides_Update);

	if($_FILES['slides_photo']['name']!=''){
		@unlink("../cloud/slides_photo/".$slides['slides_photo']);
		$Jpg = strrchr($_FILES["slides_photo"]["name"],".");
		$slides_photo = rand().rand().$Jpg;
		$upload = move_uploaded_file($_FILES["slides_photo"]["tmp_name"],"../cloud/slides_photo/".$slides_photo);
		$slides_photo_Update = "UPDATE `slides` SET `slides_photo` = '$slides_photo' WHERE `slides_id` = '$slides_id'";
		$slides_photo_Reult = mysqli_query($con,$slides_photo_Update);
		if (!$slides_photo_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
	}

	if ($slides_Reult) {
		echo"<script>   window.location='slides.php?UPDATE'; </script>";
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
						<h3> แก้ไข สไลด์ </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="slides.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								กรอกรายละเอียด "สไลด์"  ที่ต้องการแก้ไข
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-md-3" >รูปสไลด์ </label>
										<div class="col-md-6">
											<input type="file" class="form-control" name="slides_photo"  placeholder="">
										</div>
										<label class="control-label col-md-3 text-left text-red" >  รูปที่ต้องการนำมาแทนรูปเดิม  </label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ลิ้ง  </label>
										<div class="col-md-6">
											<input name="slides_link" Type="text" class="form-control" value="<? echo $slides[slides_link]; ?>"  placeholder="ไม่จำเป็น">
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-3 col-md-6">
											<button onclick="return confirm('บันทึกการแก้ไข ? ')" type="submit"  class="btn btn-info">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
											<input type="hidden" name="slidesUpdate" value="x">
										</div>
									</div>
								</form>
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


