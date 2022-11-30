<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'admin.php';

if (isset($_GET[admin_id])){
	$_SESSION[admin_id] =  $_GET[admin_id];
}
$admin_id =   $_SESSION[admin_id] ;

$admin_SL = " SELECT * FROM admin WHERE admin_id = '$admin_id'";
$admin_QR = mysqli_query($con,$admin_SL);
$admin 	= mysqli_fetch_array($admin_QR);

if ($_POST['adminUpdate']) {

	if ($_POST[admin_pass]==$_POST[admin_pass_con]) {
		$admin_name = trim($_POST['admin_name']);
		$admin_user = trim($_POST['admin_user']);
		$admin_pass = trim($_POST['admin_pass']);
		$admin_degree_id = trim($_POST['admin_degree_id']);

		$admin_Update = "UPDATE `admin` SET 
		`admin_name` = '$admin_name',
		`admin_user` = '$admin_user',
		`admin_pass` = '$admin_pass',
		`admin_degree_id` = '$admin_degree_id'
		WHERE `admin_id` = '$admin_id'";
		$admin_Reult = mysqli_query($con,$admin_Update);

		if (!$admin_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($admin_Reult) {
			echo"<script>   window.location='admin_one.php?UPDATE'; </script>";
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
						<h3>  แก้ไข ผู้ดูแล    : <span class="text-primary bold"> <?php echo $admin[admin_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="admin_one.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" enctype="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "  ผู้ดูแล  " ที่ต้องการแก้ไข
								</div>
								<div class="panel-body">
									
									<div class="form-group">
										<label class="control-label col-md-3" > ชื่อเข้าใช้     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="admin_user" type="text" class="form-control"  name="admin_user" value="<? echo $admin[admin_user]; ?>"  required  placeholder="ใช้สำหรับ ล๊อกอิน เข้าสู่หน้าแอดมิน" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รหัสผ่าน   </label>
										<div class="col-md-6">
											<input id="admin_pass" type="password" class="form-control"  name="admin_pass" value="<? echo $admin[admin_pass]; ?>"    placeholder="(6-15 ตัว )" minlength="6" maxlength="15" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ยืนยัน รหัสผ่าน   </label>
										<div class="col-md-6">
											<input id="admin_pass_con" type="password" class="form-control"  name="admin_pass_con" value="<? echo $admin[admin_pass]; ?>"    placeholder="" minlength="6" maxlength="15" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ระดับ  </label>
										<div class="col-md-6">
											<select class="form-control"  name="admin_degree_id"  onChange ="Listamphure(this.value)">
												<?
												$admin_degree_SL = " SELECT * FROM admin_degree WHERE admin_degree_id = '$admin[admin_degree_id]'";
												$admin_degree_QR = mysqli_query($con,$admin_degree_SL);
												$admin_degree 	= mysqli_fetch_array($admin_degree_QR);

												if (!isset($admin_degree[admin_degree_id])||$admin_degree[admin_degree_id]=='') {
													?>
													<option value=""> -- </option>
													<?
												}
												else{
													?>
													<option value="<?php echo $admin_degree[admin_degree_id]; ?>"><? echo $admin_degree[admin_degree_name]; ?></option>
													<?
												}
												$admin_degree_SL = " SELECT * FROM admin_degree WHERE admin_degree_id != '$admin[admin_degree_id]' ORDER BY admin_degree_id ASC";
												$admin_degree_QR 	= mysqli_query($con,$admin_degree_SL);
												while ($admin_degree 	= mysqli_fetch_array($admin_degree_QR)) {
													?>
													<option value="<?php echo $admin_degree[admin_degree_id]; ?>"><?php echo $admin_degree[admin_degree_name]; ?></option>
													<?
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ชื่อผู้ดูแล     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="admin_name" type="text" class="form-control"  name="admin_name" value="<? echo $admin[admin_name]; ?>"  required  >
										</div>
									</div>

									<div class="form-group"> 
										<div class="col-md-offset-3 col-md-6">
											<button onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit"  class="btn btn-info">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
											<input type="hidden" name="adminUpdate" value="x">
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


