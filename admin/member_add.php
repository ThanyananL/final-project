<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'member.php';

if ($_POST['member_Add']) {

	if ($_POST[member_password]==$_POST[member_password_con]) {

		$member_name = trim($_POST['member_name']);
		$member_email = trim($_POST['member_email']);
		$member_phone = trim($_POST['member_phone']);
		$member_address = trim($_POST['member_address']);
		$member_zipcode = trim($_POST['member_zipcode']);
		$member_password = trim($_POST['member_password']);

		$member_Add = "INSERT INTO `member` (`member_name`,`member_email`,`member_phone`,`member_address`,`member_zipcode`,`member_password`,`member_now`)
		VALUES('$member_name','$member_email','$member_phone','$member_address','$member_zipcode','$member_password',now() )";

		$member_Reult = mysqli_query($con,$member_Add);
		$_SESSION[member_id] = mysqli_insert_id($con);

		if (!$member_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($member_Reult) {
			echo"<script>  window.location='member_one.php?INSERT'; </script>";
		}
	}
	else{
		echo " <script>alert('กรุณากรอกรหัสผ่าน ให้ตรงกันทั้งสองช่อง '); window.history.back(); </script>";
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
						<h3>  เพิ่ม    สมาชิก      </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="member.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "   สมาชิก   " ที่ต้องการเพิ่ม
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" >  ชื่อ - นามสกุล     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input  type="text" class="form-control"  name="member_name"  required  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" >  อีเมล    <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input  type="text" class="form-control"  name="member_email"  required  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" >  เบอรติดต่อ    <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input  type="text" class="form-control"  name="member_phone"  required  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" >  ที่อยู่    <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input  type="text" class="form-control"  name="member_address"  required  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" >  รหัสไปรษณีย์    <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input  type="text" class="form-control"  name="member_zipcode"  required  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รหัสผ่าน     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input  type="password" class="form-control"  name="member_password"  required  placeholder="(6-15 ตัว )" minlength="6" maxlength="15" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ยืนยัน รหัสผ่าน     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input  type="password" class="form-control"  name="member_password_con"  required  placeholder="" minlength="6" maxlength="15" >
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-3 col-md-6">
											<button Type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input Type="hidden" name="member_Add" value="x">
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


