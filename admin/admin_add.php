<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'admin.php';

if ($_POST['admin_Add']) {

	if ($_POST[admin_pass]==$_POST[admin_pass_con]) {

		$admin_name = trim($_POST['admin_name']);
		$admin_user = trim($_POST['admin_user']);
		$admin_pass = trim($_POST['admin_pass']);
		$admin_degree_id = trim($_POST['admin_degree_id']);

		$admin_page = rand();
		$admin_Add = "INSERT INTO `admin` (`admin_name`,`admin_user`, `admin_pass`,`admin_degree_id`,`admin_date`,`admin_time`)
		VALUES('$admin_name','$admin_user','$admin_pass','$admin_degree_id',now(),now() )";
		$admin_Reult = mysqli_query($con,$admin_Add);
		$_SESSION[admin_id] = mysqli_insert_id($con);
		if (!$admin_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด หรือ ลิ้งเพจซ้ำ'); window.history.back(); </script>";
		}
		if ($admin_Reult) {
			echo"<script>  window.location='admin_one.php?INSERT'; </script>";
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
						<h3>  เพิ่ม    ผู้ดูแล      </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="admin.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "   ผู้ดูแล   " ที่ต้องการเพิ่ม
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" > ชื่อเข้าใช้ (ล๊อกอิน)    <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="admin_user" type="text" class="form-control"  name="admin_user"  required  placeholder="ใช้สำหรับ ล๊อกอิน เข้าสู่หน้าแอดมิน" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รหัสผ่าน     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="admin_pass" type="password" class="form-control"  name="admin_pass"  required  placeholder="(6-15 ตัว )" minlength="6" maxlength="15" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ยืนยัน รหัสผ่าน     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="admin_pass_con" type="password" class="form-control"  name="admin_pass_con"  required  placeholder="" minlength="6" maxlength="15" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ระดับ     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<select class="form-control"  name="admin_degree_id" >
												<option value="" > - </option>
												<?
												$admin_degree_SL = " SELECT * FROM admin_degree  ORDER BY admin_degree_id ASC";
												$admin_degree_QR 	= mysqli_query($con,$admin_degree_SL);
												while ($admin_degree 	= mysqli_fetch_array($admin_degree_QR)) {
													?>
													<option value="<?php echo $admin_degree[admin_degree_id]; ?>"><?php echo $admin_degree[admin_degree_name]; ?>  </option>
													<?
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ชื่อผู้ดูแล     <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="admin_name" type="text" class="form-control"  name="admin_name"  required  >
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-3 col-md-6">
											<button Type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input Type="hidden" name="admin_Add" value="x">
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


