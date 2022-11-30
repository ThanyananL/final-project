<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'admin.php';
if (isset($_GET[admin_id])){
	$_SESSION[admin_id] =  $_GET[admin_id];
}
$admin_id =   $_SESSION[admin_id] ;

if (isset($_GET[page])){
	$_SESSION[numpage] =  $_GET[page];
}
$page =   $_SESSION[numpage];

$admin_SL = " SELECT * FROM admin WHERE admin_id = '$admin_id'";
$admin_QR = mysqli_query($con,$admin_SL);
$admin 	= mysqli_fetch_array($admin_QR);

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
						<h3>       ผู้ดูแล      : <span class="text-primary bold"> <?php echo $admin[admin_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="admin.php?page=<? echo $page; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="admin_update.php?admin_id=<?php echo $admin[admin_id]; ?>" class="btn btn-info"><span class="glyphicon glyphicon-wrench"></span> แก้ไข</a>
						<a href="admin_del.php?admin_id=<?php echo $admin[admin_id]; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล ? ')"  class="btn btn-danger">
							<span class="glyphicon glyphicon-remove-sign"></span> ลบ
						</a>
					</div>
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียดผู้ดูแล     :  <span class="text-primary bold"> <?php echo $admin[admin_name]; ?> </span>
							</div>
							<div class="panel-body">
								<div class="row br-margin2">
									<div class="col-md-12">
										<form class="form-horizontal">
											<div class="form-group">
												<label class="control-label col-md-3" > ชื่อเข้าใช้ (ล๊อกอิน)     </label>
												<label class="control-label col-md-9 text-left">
													<? echo $admin[admin_user]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >รหัสผ่าน</label>
												<label class="control-label col-md-9 text-left">
													<? 
													if (isset($admin[admin_pass])&&trim($admin[admin_pass])!='') {
														echo $admin[admin_pass];
													}
													else{
														echo " - ";
													}
													?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >ระดับ</label>
												<label class="control-label col-md-9 text-left">
													<? 
													$admin_degree_SL = " SELECT * FROM admin_degree WHERE admin_degree_id = '$admin[admin_degree_id]'";
													$admin_degree_QR = mysqli_query($con,$admin_degree_SL);
													$admin_degree 	= mysqli_fetch_array($admin_degree_QR);
													if (isset($admin_degree[admin_degree_name])&&trim($admin_degree[admin_degree_name])!=''&&$admin_degree[admin_degree_name]!='0') {
														echo $admin_degree[admin_degree_name]; 
													}
													else{
														echo " - ";
													}
													?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >ชื่อผู้ดูแล</label>
												<label class="control-label col-md-9 text-left">
													<? 
													if (isset($admin[admin_name])&&trim($admin[admin_name])!='') {
														echo $admin[admin_name];
													}
													else{
														echo " - ";
													}
													?>
												</label>
											</div>
										</form>
									</div>
								</div>
								<!-- row -->
							</div>
							<!-- panel body -->
						</div>
						<!-- panel -->	
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
