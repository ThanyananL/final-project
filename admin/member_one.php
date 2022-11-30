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

if ($_POST['Updatemember_point']) {

	$member_point = $_POST['member_point'];
	$member_point= str_replace("'","&#39;",$member_point);
	$member_point= str_replace("\"","&quot;",$member_point);

	$member_Update = "UPDATE `member` SET `member_point` = '$member_point'  WHERE `member_id` = '$member_id'";
	$member_Reult = mysqli_query($con,$member_Update);
	if (!$member_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($member_Reult) {
		echo"<script>   window.location='member_One.php?UPDATE'; </script>";
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
						<h3>  สมาชิก : <span class="text-primary bold"> <?php echo $member[member_name]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="member.php?page=<? echo $_SESSION[numpage]; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="member_update.php?member_id=<?php echo $member[member_id]; ?>" class="btn  btn-info">
							<span class="glyphicon glyphicon-edit"></span>
							แก้ไข
						</a>
						<a href="member_del.php?member_id=<?php echo $member[member_id]; ?>" onclick="return confirm(' คุณต้องการลบข้อมูลนี้ใช่ หรือไม่  ? ')"  class="btn btn-danger">
							<span class="glyphicon glyphicon-remove-sign"></span> ลบ
						</a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียด สมาชิก : <span class="text-primary bold"> <?php echo $member[member_name]; ?> </span>
							</div>
							<div class="panel-body">
								<form class="form-horizontal">
									<div class="form-group">
										<label class="control-label col-md-2" > ชื่อ - นามสกุล</label>
										<label class="control-label col-md-10 text-left">
											<? echo $member[member_name]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >อีเมล</label>
										<label class="control-label col-md-10 text-left">
											<?
											if (isset($member[member_email])&&trim($member[member_email])!='') {
												echo $member[member_email];
											}
											else{
												echo " - ";
											}
											?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >เบอรติดต่อ</label>
										<label class="control-label col-md-10 text-left">
											<? echo $member[member_phone]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >ที่อยู่</label>
										<label class="control-label col-md-10 text-left">
											<? echo $member[member_address]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >รหัสไปรษณีย์</label>
										<label class="control-label col-md-10 text-left">
											<? echo $member[member_zipcode]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >เป็นสมาชิกเมื่อ</label>
										<label class="control-label col-md-10 text-left">
											<? echo $member[member_now]; ?>
										</label>
									</div>
								</form>
								<!-- model -->
								<div class="modal fade" id="Updatemember_point" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<form  method="post" enctype="multipart/form-data">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">
														อัพเดทแต้ม : <span class="text-primary bold"> <?php echo $member[member_name]; ?> </span>
													</h4>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<label > แต้ม <span class="text-red"> * </span>  </label>
														<input type="number" class="form-control"  required value="<? echo $member[member_point]; ?>" name="member_point" >
													</div>
												</div>
												<div class="modal-footer">
													<button onclick="return confirm('ยืนยันการอัพเดท ? ')" type="submit"  class="btn btn-info">
														<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
													</button>
													<input type="hidden" name="Updatemember_point" value="x">
													<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- modal -->

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
