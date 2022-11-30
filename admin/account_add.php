<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'account.php';

if ($_POST['account_add']) {
	$account_bank = $_POST['account_bank'];
	$account_number = $_POST['account_number'];
	$account_name = $_POST['account_name'];
	$account_add = "INSERT INTO `account` (`account_bank`,`account_number`,`account_name`) 
	VALUES ('$account_bank','$account_number','$account_name')";
	$account_Reult = mysqli_query($con,$account_add);
	$_SESSION[account_id] = mysqli_insert_id($con);
	if (!$account_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($account_Reult) {

		if($_FILES['account_photo']['name']!=''){
			$suffix = strrchr($_FILES["account_photo"]["name"],".");
			$account_photo = rand().$suffix;
			$upload = move_uploaded_file($_FILES["account_photo"]["tmp_name"],"../cloud/account_photo/".$account_photo);
			$account_photo_Update = "UPDATE `account` SET `account_photo` = '$account_photo' WHERE `account_id` = '$_SESSION[account_id]'";
			$account_photo_Reult = mysqli_query($con,$account_photo_Update);
		}

		echo"<script>  window.location='account.php?INSERT'; </script>";
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
						<h3>  เพิ่ม บัญชีธนาคาร  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="account.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								กรอกรายละเอียด " บัญชีธนาคาร " ที่ต้องการเพิ่ม
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-md-2" >ธนาคาร <span class="text-red">*</span> </label>
										<div class="col-md-5">
											<input type="text" class="form-control" required name="account_bank"  placeholder="ตัวอย่างเช่น ธนาคารกรุงเทพ">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >เลขบัญชี <span class="text-red">*</span> </label>
										<div class="col-md-5">
											<input type="text" class="form-control" required name="account_number"  placeholder="00-0000-000-00">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >ชื่อบัญชี <span class="text-red">*</span></label>
										<div class="col-md-5">
											<input type="text" class="form-control"  name="account_name"  placeholder="ชื่อบัญชี" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > รูปคิวอาร์ โค้ด </label>
										<div class="col-md-5">
											<input Type="file" class="form-control"  name="account_photo"  >
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-2 col-md-5">
											<input type="submit" name="account_add" value="ยืนยันการเพิ่ม" class="btn btn-success" >
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


