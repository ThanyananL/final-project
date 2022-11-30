<? 
include 'index_IncludeAdmin.php'; 

$_SESSION['page'] = 'account.php';

if (isset($_GET[account_id])){
	$_SESSION[account_id] =  $_GET[account_id];
}
$account_id =   $_SESSION[account_id] ;

$account_SL = " SELECT * FROM account WHERE account_id = '$account_id'";
$account_QR = mysqli_query($con,$account_SL);
$account 	= mysqli_fetch_array($account_QR);

if ($_POST['account_photo_update']) {
	if($_FILES['account_photo']['name']!=''){
		@unlink("../cloud/account_photo/".$account['account_photo']);
		$suffix = strrchr($_FILES["account_photo"]["name"],".");
		$account_photo = $account[account_page]."-".rand().$suffix;
		$upload = move_uploaded_file($_FILES["account_photo"]["tmp_name"],"../cloud/account_photo/".$account_photo);
		$account_photo_Update = "UPDATE `account` SET `account_photo` = '$account_photo' WHERE `account_id` = '$_SESSION[account_id]'";
		$account_photo_Reult = mysqli_query($con,$account_photo_Update);
		$table =  'account';
		min_resize($account_photo,$table);
		if (!$account_photo_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($account_photo_Reult) {
			echo"<script>   window.location='account_one.php?UPDATE'; </script>";
		}
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
						<h3>  บัญชี : <span class="text-primary bold"> <?php echo $account[account_bank]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="account.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="account_update.php?account_id=<?php echo $account[account_id]; ?>" class="btn btn-info">
							<span class="glyphicon glyphicon-edit"></span>
							แก้ไข
						</a>
						<a href="account_del.php?account_id=<?php echo $account[account_id]; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล ?  ')"  class="btn btn-danger">
							<span class="glyphicon glyphicon-trash"></span>
							ลบ
						</a>
					</div>
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียดบัญชี : <span class="text-primary bold"> <?php echo $account[account_bank]; ?> </span>
							</div>
							<div class="panel-body">
								<form class="form-horizontal">
									<div class="form-group">
										<label class="control-label col-md-2" > บัญชีธนาคาร</label>
										<label class="control-label col-md-10 text-left">
											<? echo $account[account_bank]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >เลขบัญชี</label>
										<label class="control-label col-md-10 text-left">
											<? echo $account[account_number]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >ชื่อบัญชี</label>
										<label class="control-label col-md-10 text-left">
											<? echo $account[account_name]; ?>
										</label>
									</div>
								</form>
							</div>
							<div class="panel-footer">
							</div>
						</div>
					</div>
					<!-- 8 -->
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading"> 
								<div class="row">
									<div class="col-md-4">
										จัดการรูปภาพ
									</div>
									<div class="col-md-8 text-right" style="margin: -5px;">
										<button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#account_photo_update"> 
											<span class="glyphicon glyphicon-picture"></span>
											แก้ไขรูป 
										</button>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12 br-margin2">
										<img class="full" style="cursor: zoom-in;" id="myImgmain<?php echo $account[account_id]; ?>" src="../cloud/account_photo/<?php echo $account[account_photo]; ?>"  />
										<div id="myModal" class="w3-modal">
											<span class="zoom-close w3-close">&times;</span>
											<img class="w3-modal-content w3-close" id="img01">
										</div>
										<script>
											var w3modal = document.getElementById("myModal");
											var img = document.getElementById("myImgmain<?php echo $account[account_id]; ?>");
											var modalImg = document.getElementById("img01");
											img.onclick = function(){
												w3modal.style.display = "block";
												modalImg.src = this.src;
											}
											var span = document.getElementsByClassName("w3-close")[0];
											span.onclick = function() { 
												w3modal.style.display = "none";
											}
											window.onclick = function(event) {
												if (event.target == w3modal) {
													w3modal.style.display = "none";
												}
											}
										</script>
									</div>
								</div>
							</div>
						</div>
					</div>
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


