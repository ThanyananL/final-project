<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'portage.php';

if ($_POST['portage_Add']) {

	$portage_name = $_POST['portage_name'];
	$portage_name= str_replace("'","&#39;",$portage_name);
	$portage_name= str_replace("\"","&quot;",$portage_name);


	$portage_detail = $_POST['portage_detail'];
	$portage_detail= str_replace("'","&#39;",$portage_detail);
	$portage_detail= str_replace("\"","&quot;",$portage_detail);

	$portage_link = $_POST['portage_link'];
	$portage_link = str_replace("'","&#39;",$portage_link);
	$portage_link = str_replace("\"","&quot;",$portage_link);
	$portage_link = str_replace("http://","",$portage_link);
	$portage_link = str_replace("https://","",$portage_link);

	$portage_Add = "INSERT INTO `portage` (`portage_name`,`portage_detail`,`portage_link`) VALUES ('$portage_name','$portage_detail','$portage_link')";
	$portage_Reult = mysqli_query($con,$portage_Add);
	if (!$portage_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($portage_Reult) {
		echo"<script>  window.location='portage.php?INSERT'; </script>";
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
						<h3>  เพิ่ม บริการส่งพัสดุ  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="portage.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								กรอกรายละเอียด " บริการส่งพัสดุ " ที่ต้องการเพิ่ม
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-md-2" >ชื่อบริการส่งพัสดุ <span class="text-red"> * </span>  </label>
										<div class="col-md-6">
											<input type="text" class="form-control"  required  name="portage_name" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >รายละเอียด</label>
										<div class="col-md-6">
											<textarea  name="portage_detail" class="form-control"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >ลิ้ง ติดตามพัสดุ </label>
										<div class="col-md-6">
											<input   type="text" class="form-control"  name="portage_link" >
										</div>
										<label class="control-label col-md-4 text-left ">
											เว็บไซต์ของผู้ให้บริการ
										</label>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-2 col-md-10">
											<button Type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input type="hidden" name="portage_Add" value="x">
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


