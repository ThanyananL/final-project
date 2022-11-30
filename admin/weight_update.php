<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'weight.php';

if (isset($_GET[weight_id])){
	$_SESSION[weight_id] =  $_GET[weight_id];
}
$weight_id =   $_SESSION[weight_id] ;

$weight_SL = " SELECT * FROM weight WHERE weight_id = '$weight_id'";
$weight_QR = mysqli_query($con,$weight_SL);
$weight 	= mysqli_fetch_array($weight_QR);

if ($_POST['weight_Update']) {

	$weight_price = $_POST['weight_price'];
	$weight_min = $_POST['weight_min'];
	$weight_max = $_POST['weight_max'];

	$weight_Update = "UPDATE `weight` SET `weight_min` = '$weight_min' ,`weight_max` = '$weight_max' , `weight_price` = '$weight_price' WHERE `weight_id` = '$weight_id'";
	$weight_Reult = mysqli_query($con,$weight_Update);

	if (!$weight_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($weight_Reult) {
		echo"<script>   window.location='weight.php?UPDATE'; </script>";
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
						<h3>  อัพเดทราคาน้ำหนักค่าจัดส่ง : <span class="text-primary bold"> <?php echo $weight[weight_price]; ?> ( <?php echo number_format($weight[weight_min]); ?> - <?php echo number_format($weight[weight_max]); ?> กรัม ) </span>  </h3>
						<hr>
					</div>
				</div>

				<div class="row">

					<div class="col-md-12 br-margin2">
						<a href="weight.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>

					<div class="col-md-12">

						<div class="panel panel-default">
							<div class="panel-heading">
								กรอกรายละเอียดที่ต้องการอัพเดท
							</div>
							<div class="panel-body">
								
								<form class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-md-2" > ราคาค่าส่ง <span class="text-red"> * </span> </label>
										<div class="col-md-5">
											<input type="number" class="form-control"  required  name="weight_price" value="<? echo $weight[weight_price]; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > น้ำหนักต่ำสุด (กรัม) <span class="text-red"> * </span> </label>
										<div class="col-md-5">
											<input type="number" class="form-control"    name="weight_min" value="<? echo $weight[weight_min]; ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > น้ำหนักสูงสุด (กรัม)  <span class="text-red"> * </span> </label>
										<div class="col-md-5">
											<input type="number" class="form-control"    name="weight_max" value="<? echo $weight[weight_max]; ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" ></label>
										<label class="control-label col-md-2 text-left normal text-muted">
											1,000 กรัม เท่ากับ 1 กิโลกรัม
										</label>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-2 col-md-10">
											<button  onclick="return confirm('ยืนยันการอัพเดท ? ')" type="submit" class="btn btn-success">
												<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
											</button>
											<input type="hidden" name="weight_Update" value="x">
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


