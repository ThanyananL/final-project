<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'contactus.php';

if (isset($_GET[contactus_id])){
	$_SESSION[contactus_id] =  $_GET[contactus_id];
}
$contactus_id =   $_SESSION[contactus_id] ;


$contactus_SL = " SELECT * FROM contactus WHERE contactus_id = '$contactus_id'";
$contactus_QR = mysqli_query($con,$contactus_SL);
$contactus 	= mysqli_fetch_array($contactus_QR);

if ($contactus[notification_id]==1) {
	$contactus_notificatio_id = $_POST['contactus_notificatio_id'];
	$contactus_notificatio_update = "UPDATE `contactus` SET `notification_id` = '2' WHERE `contactus_id` = '$contactus_id'";
	$contactus_notificatio_Reult = mysqli_query($con,$contactus_notificatio_update);
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
						<h3>   การติดต่อเข้ามา  : <span class="text-primary bold"> <?php echo $contactus[contactus_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-6 br-margin2">
						<a href="contactus.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="contactus_del.php?contactus_id=<?php echo $contactus[contactus_id]; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-danger">
							<span class="glyphicon glyphicon-trash"></span>
							ลบ
						</a>
					</div>
					<div class="col-md-6">
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียด การติดต่อเข้ามา  : <span class="text-primary bold"> <?php echo $contactus[contactus_name]; ?> </span>
							</div>
							<div class="panel-body">
								<div class="row br-margin3">
									<div class="col-md-12">
										<form class="form-horizontal">
											<div class="form-group">
												<label class="control-label col-md-3" > ชื่อ </label>
												<label class="control-label col-md-9 text-left">
													<? echo $contactus[contactus_name]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" > นามสกุล </label>
												<label class="control-label col-md-9 text-left">
													<? echo $contactus[contactus_last]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" > อีเมล  </label>
												<label class="control-label col-md-9 text-left">
													<? echo $contactus[contactus_email]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" > เบอร์โทรศัพท์  </label>
												<label class="control-label col-md-9 text-left">
													<? echo $contactus[contactus_phone]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" > บริษัท  </label>
												<label class="control-label col-md-9 text-left">
													<?
													if (isset($contactus[contactus_company])&&trim($contactus[contactus_company]!='')) {
														echo $contactus[contactus_company];
													}
													else{
														echo " - ";
													}
													?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" > ข้อความ  </label>
												<label class="control-label col-md-9 text-left">
													<?
													if (isset($contactus[contactus_message])&&trim($contactus[contactus_message]!='')) {
														echo $contactus[contactus_message];
													}
													else{
														echo " - ";
													}
													?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >วันเดือนปี </label>
												<label class="control-label col-md-9 text-left">
													<? echo displaydate($contactus[contactus_date]); ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3" >เวลา </label>
												<label class="control-label col-md-9 text-left">
													<? echo $contactus[contactus_time] ?>
												</label>
											</div>
										</form>
									</div>
									<!-- 7 -->
								</div>
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


