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

if ($_POST['account_Update']) {
	$account_bank = $_POST['account_bank'];
	$account_number = $_POST['account_number'];
	$account_name = $_POST['account_name'];
	$account_Update = "UPDATE `account` SET `account_bank` = '$account_bank',`account_name` = '$account_name',`account_number` = '$account_number' WHERE `account_id` = '$account_id'";
	$account_Reult = mysqli_query($con,$account_Update);
	if (!$account_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($account_Reult) {

		if($_FILES['account_photo']['name']!=''){
			@unlink("../cloud/account_photo/".$account['account_photo']);
			$suffix = strrchr($_FILES["account_photo"]["name"],".");
			$account_photo = rand().$suffix;
			$upload = move_uploaded_file($_FILES["account_photo"]["tmp_name"],"../cloud/account_photo/".$account_photo);
			$account_photo_Update = "UPDATE `account` SET `account_photo` = '$account_photo' WHERE `account_id` = '$_SESSION[account_id]'";
			$account_photo_Reult = mysqli_query($con,$account_photo_Update);
			$table =  'account';
			min_resize($account_photo,$table);
		}

		echo"<script>   window.location='account_one.php?UPDATE'; </script>";
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
						<h3>  แก้ไขบัญชีธนาคาร : <span class="text-primary bold"> <?php echo $account[account_bank]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="account_one.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								กรอกรายละเอียด " บัญชีธนาคาร " ที่ต้องการแก้ไข
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-sm-2" >บัญชีธนาคาร<span class="text-red">*</span> </label>
										<div class="col-sm-5">
											<input value="<? echo $account[account_bank]; ?>" type="text" class="form-control" required name="account_bank"  placeholder="บัญชีธนาคาร">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >เลขบัญชี <span class="text-red">*</span></label>
										<div class="col-sm-5">
											<input value="<? echo $account[account_number]; ?>"  type="text" class="form-control" required name="account_number"  placeholder="เลขบัญชี">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >ชื่อบัญชี  <span class="text-red">*</span></label>
										<div class="col-sm-5">
											<input value="<? echo $account[account_name]; ?>"  type="text" class="form-control"  name="account_name" required placeholder="ชื่อบัญชี">
										</div>
									</div>
									<div class="form-group"> 
										<label class="control-label col-md-2" > รูป   </label>
										<div class="col-md-5">
											<input type="file"  class="form-control"  name="account_photo">
										</div>
										<label class="control-label col-md-3 text-left" >
											รูปที่จะนำมาแทนรูปเดิม
										</label>
									</div>
									<div class="form-group"> 
										<div class="col-sm-offset-2 col-sm-5">
											<input type="hidden" name="account_Update" value="x">
											<button  onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit" class="btn btn-info">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
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
	
</body>
</html>


