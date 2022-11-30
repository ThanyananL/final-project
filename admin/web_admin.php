<?php 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'web_admin.php';
$admin_SL = " SELECT * FROM admin WHERE admin_id = '$_SESSION[login_admin_id]'";
$admin_QR = mysqli_query($con,$admin_SL);
$admin 	= mysqli_fetch_array($admin_QR);
if ($_POST['Updateadmin']) {
	$admin_name = trim($_POST['admin_name']);
	$admin_user = trim($_POST['admin_user']);
	$admin_Up = "UPDATE admin SET admin_name = '$admin_name',admin_user = '$admin_user' WHERE admin_id = '$_SESSION[login_admin_id]' ";
	$admin_Reult = mysqli_query($con,$admin_Up);
	if ($admin_Reult) {
		echo"<script>alert('แก้ไขเรียบร้อยแล้ว'); window.location='web_admin.php?UPDATE';</script>";
	}
	else {
		echo"<script>alert('admin_Reult'); window.history.back(); </script>";
	}
}
if (trim($_POST['UpdatePassword'])) {
	if (trim($_POST['admin_pass'])!=trim($_POST['admin_passCon'])) {
		echo"<script>alert('กรุณากรอกรหัสผ่านให้ตรงกันนะคะ'); window.history.back(); </script>";
	}
	else{
		$admin_pass_old = trim($_POST['admin_pass_old']);
		$admin_pass_old= str_replace("'","&#39;",$admin_pass_old);
		$admin_pass_old= str_replace("\"","&quot;",$admin_pass_old);
		$Check_Add = "SELECT * FROM admin WHERE admin_id = '$_SESSION[login_admin_id]' AND admin_pass = '$admin_pass_old' ";
		$Check_Reult = mysqli_query($con,$Check_Add);
		$Check_Row 		= mysqli_num_rows($Check_Reult);
		if (!$Check_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($Check_Row > 0) {
			$admin_pass = trim($_POST['admin_pass']);
			$admin_Update = "UPDATE admin SET admin_pass = '$admin_pass' WHERE admin_id = '$_SESSION[login_admin_id]' ";
			$admin_Reult = mysqli_query($con,$admin_Update);
			if ($admin_Reult) {
				echo"<script>alert('แก้ไขเรียบร้อยแล้ว'); window.location='web_admin.php?UPDATE';</script>";
			}

		}
		else{
			echo"<script>alert('คุณกรอกรหัสผ่านปัจจุบันไม่ถูกต้องค่ะ'); window.history.back(); </script>";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'index_Head.php'; ?>
</head>
<body>
	<?php include 'index_Navbar.php'; ?>	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2" id="main-left">
				<div class="row">
					<div class="col-md-12">
						<?php include 'index_AdminMenu.php'; ?>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						<h3>  จัดการข้อมูลแอดมิน  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								จัดการข้อมูลแอดมิน
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post">
									<div class="form-group">
										<label class="control-label col-sm-3" for="email">ชื่อแอดมิน :</label>
										<div class="col-sm-5 control-label text-left">
											<?php echo $admin[admin_name]; ?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="email">ชื่อเข้าใช้ / username :</label>
										<div class="col-sm-5 control-label text-left">
											<?php echo $admin[admin_user]; ?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="email">รหัสผ่าน :</label>
										<div class="col-sm-5 control-label text-left">
											******
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-sm-offset-3 col-sm-5">
											<button type="button" class="btn btn-info" data-toggle="modal" data-target="#Updateadmin">
												<span class="glyphicon glyphicon-edit"></span> แก้ไขข้อมูล
											</button> 
											<button type="button" class="btn btn-info" data-toggle="modal" data-target="#UpdatePassword">
												<span class="glyphicon glyphicon-edit"></span> แก้ไขรหัสผ่าน
											</button> 
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
	<div id="Updateadmin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลแอดมิน </h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label" for="email">ชื่อแอดมิน <span class="text-red"> * </span> </label>
							<input minlength="4" name="admin_name" value="<?php echo $admin[admin_name]; ?>" type="text"  class="form-control" placeholder="ชื่อแอดมิน" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="email">ชื่อเข้าใช้ / username <span class="text-red"> * ( ใช้สำรหับล๊อกอิน ) </span> </label>
							<input  minlength="4" name="admin_user" value="<?php echo $admin[admin_user]; ?>" type="text" class="form-control" placeholder="ชื่อเข้าใช้ / username" required>
						</div>
					</div>
					<div class="modal-footer">
						
						<button type="submit" class="btn btn-info">
							<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
						<input Type="hidden" name="Updateadmin" value="x">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="UpdatePassword"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">แก้ไขรหัสผ่าน</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="recipient-name" class="control-label">รหัสผ่านปัจจุบัน <span class="text-red"> * </span>  </label>
							<input minlength="4" type="password" class="form-control" required name="admin_pass_old">
						</div>
						<div class="form-group">
							<label for="message-text" class="control-label">รหัสผ่านใหม่ <span class="text-red"> * </span> </label>
							<input minlength="4" type="password" class="form-control"  required name="admin_pass">
						</div>
						<div class="form-group">
							<label for="message-text" class="control-label">ยืนยันรหัสผ่าน <span class="text-red"> * </span> </label>
							<input minlength="4" type="password" class="form-control"  required name="admin_passCon">
						</div>
					</div>
					<div class="modal-footer">
						
						<button type="submit" class="btn btn-info">
							<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
						<input Type="hidden" name="UpdatePassword" value="x">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
