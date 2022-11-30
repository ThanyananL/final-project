<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'member.php';

if (isset($_GET[member_id])){
	$_SESSION[member_id] =  $_GET[member_id];
}
$member_id =   $_SESSION[member_id] ;

$member_SL = " SELECT * FROM member WHERE member_id = '$member_id'";
$member_QR = mysqli_query($con,$member_SL);
$member 	= mysqli_fetch_array($member_QR);

if ($_POST['memberUpdate']) {

	if ($_POST[member_password]==$_POST[member_password_con]) {

		$member_name = trim($_POST['member_name']);
		$member_email = trim($_POST['member_email']);
		$member_phone = trim($_POST['member_phone']);
		$member_address = trim($_POST['member_address']);
		$member_zipcode = trim($_POST['member_zipcode']);
		$member_password = trim($_POST['member_password']);

		$member_Update = "UPDATE `member` SET 
		`member_name` = '$member_name',
		`member_email` = '$member_email',
		`member_phone` = '$member_phone',
		`member_address` = '$member_address',
		`member_zipcode` = '$member_zipcode',
		`member_password` = '$member_password'
		WHERE `member_id` = '$member_id'";
		$member_Reult = mysqli_query($con,$member_Update);

		if (!$member_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($member_Reult) {
			echo"<script>   window.location='member_one.php?UPDATE'; </script>";
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
						<h3>  แก้ไข สมาชิก    : <span class="text-primary bold"> <?php echo $member[member_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="member_one.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "  สมาชิก  " ที่ต้องการแก้ไข
								</div>
								<div class="panel-body">
									
									<div class="form-group">
										<label class="control-label col-md-3" >  ชื่อ - นามสกุล     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input  type="text" class="form-control"  name="member_name"  required  value="<? echo $member[member_name]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" >  อีเมล    <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input  type="text" class="form-control"  name="member_email"  required  value="<? echo $member[member_email]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" >  เบอรติดต่อ    <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input  type="text" class="form-control"  name="member_phone"  required  value="<? echo $member[member_phone]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" >  ที่อยู่    <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input  type="text" class="form-control"  name="member_address"  required  value="<? echo $member[member_address]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" >  รหัสไปรษณีย์    <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input  type="text" class="form-control"  name="member_zipcode"  required  value="<? echo $member[member_zipcode]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รหัสผ่าน     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input  type="password" class="form-control"  name="member_password"  required  value="<? echo $member[member_password]; ?>" placeholder="(6-15 ตัว )" minlength="6" maxlength="15" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ยืนยัน รหัสผ่าน     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input  type="password" class="form-control"  name="member_password_con"  required  value="<? echo $member[member_password_con]; ?>" placeholder="" minlength="6" maxlength="15" >
										</div>
									</div>

									<div class="form-group"> 
										<div class="col-md-offset-3 col-md-6">
											<button onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit"  class="btn btn-info">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
											<input type="hidden" name="memberUpdate" value="x">
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


