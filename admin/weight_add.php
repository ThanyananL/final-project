<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'weight.php';

if ($_POST['weight_add']) {

	$weight_price = $_POST['weight_price'];
	$weight_min = $_POST['weight_min'];
	$weight_max = $_POST['weight_max'];

	$weight_add = "INSERT INTO `weight` (`weight_min`,`weight_price`,`weight_max`) VALUES ('$weight_min','$weight_price','$weight_max')";
	$weight_Reult = mysqli_query($con,$weight_add);
	if (!$weight_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($weight_Reult) {
		echo"<script>  window.location='weight.php?INSERT'; </script>";
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
						<h3>  เพิ่มราคาน้ำหนักค่าจัดส่งใหม่  </h3>
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
								กรอกรายละเอียดที่ต้องการเพิ่ม
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-md-2" > ราคาค่าส่ง <span class="text-red"> * </span> </label>
										<div class="col-md-5">
											<input type="number" class="form-control"  required  name="weight_price">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > น้ำหนักต่ำสุด (กรัม) <span class="text-red"> * </span> </label>
										<div class="col-md-5">
											<input type="number" class="form-control"    name="weight_min" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" > น้ำหนักสูงสุด (กรัม)  <span class="text-red"> * </span> </label>
										<div class="col-md-5">
											<input type="number" class="form-control"    name="weight_max" required>
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
											<button Type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input type="hidden" name="weight_add" value="x">
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


