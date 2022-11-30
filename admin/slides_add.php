<? 

include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'slides.php';

if ($_POST['slides_add']) {

	$Jpg = strrchr($_FILES["slides_photo"]["name"],".");
	$slides_photo = rand().rand().$Jpg;

	if(move_uploaded_file($_FILES["slides_photo"]["tmp_name"],"../cloud/slides_photo/".$slides_photo)){

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

		$slides_add = "INSERT INTO `slides` (`slides_photo`,`slides_topic`,`slides_detail`,`slides_link`) VALUES ('$slides_photo','$slides_topic','$slides_detail','$slides_link')";
		$slides_Reult = mysqli_query($con,$slides_add);
		if (!$slides_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($slides_Reult) {
			echo"<script>  window.location='slides.php?INSERT'; </script>";
		}
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
						<h3>  เพิ่ม สไลด์ </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="slides.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด " สไลด์ "  ที่ต้องการเพิ่ม 
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" >รูปสไลด์ <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input type="file" class="form-control"  name="slides_photo" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ลิ้ง  </label>
										<div class="col-md-6">
											<input name="slides_link" Type="text" class="form-control" placeholder="ไม่จำเป็น">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" ></label>
										<div class="col-md-6">
											<button Type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input Type="hidden" name="slides_add" value="x">
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


