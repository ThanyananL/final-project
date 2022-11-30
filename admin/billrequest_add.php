<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'order_list.php';
?>

<?
if ($_POST['billrequest_add']) {

	$billrequest_order_id = $_POST['billrequest_order_id'];
	$billrequest_date = $_POST['billrequest_date'];
	$billrequest_member_name = $_POST['billrequest_member_name'];

	$billrequest_member_address = $_POST['billrequest_member_address'];
	$billrequest_member_zipcode = $_POST['billrequest_member_zipcode'];
	$billrequest_member_phone = $_POST['billrequest_member_phone'];

	$billrequest_member_email = $_POST['billrequest_member_email'];
	$billrequest_package = $_POST['billrequest_package'];
	$billrequest_product = $_POST['billrequest_product'];

	$billrequest_p_name = $_POST['billrequest_p_name'];
	$billrequest_p_price = $_POST['billrequest_p_price'];
	$billrequest_price = $_POST['billrequest_price'];

	$billrequest_product_name = $_POST['billrequest_product_name'];
	$billrequest_product_amount = $_POST['billrequest_product_amount'];
	$billrequest_product_price = $_POST['billrequest_product_price'];
	$billrequest_product_amount_price = $_POST['billrequest_product_amount_price'];

	$billrequest_add = "INSERT INTO `billrequest` (`billrequest_product_name`,`billrequest_product_amount`,`billrequest_product_price`,`billrequest_product_amount_price`,`billrequest_p_name`,`billrequest_p_price`,`billrequest_price`,`billrequest_member_email`,`billrequest_package`,`billrequest_product`,`billrequest_member_address`,`billrequest_member_zipcode`,`billrequest_member_phone`,`billrequest_order_id`,`billrequest_date`,`billrequest_member_name`) 
	VALUES ('$billrequest_product_name','$billrequest_product_amount','$billrequest_product_price','$billrequest_product_amount_price','$billrequest_p_name','$billrequest_p_price','$billrequest_price','$billrequest_member_email','$billrequest_package','$billrequest_product','$billrequest_member_address','$billrequest_member_zipcode','$billrequest_member_phone','$billrequest_order_id','$billrequest_date','$billrequest_member_name')";

	$billrequest_Reult = mysqli_query($con,$billrequest_add);

	if (!$billrequest_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($billrequest_Reult) {
		echo"<script>  window.location='billrequest.php?INSERT'; </script>";
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
						<h3>  เพิ่ม ใบเสร็จ  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="billrequest.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								กรอกรายละเอียด " ใบเสร็จ " ที่ต้องการเพิ่ม
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-sm-2" >เลขที่ใบสั่งซื้อ </label>
										<div class="col-sm-5">
											<input  type="text" class="form-control"  name="billrequest_order_id"   >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >วันที่ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_date" >
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-2" >นามลูกค้า </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_member_name" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >ที่อยู่ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_member_address" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >รหัสไปรษณีย์ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_member_zipcode" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >เบอร์มือถือ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_member_phone" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >อีเมล์ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_member_email" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >เลขพัสดุ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_package" >
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-2" >ชื่อสินค้า </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_product_name" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >จำนวนสินค้า </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_product_amount" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >สินค้า หน่วยละ (บาท)</label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_product_price" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >ราคาสินค้ารวมในรายการ  </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_product_amount_price" >
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-sm-2" >ราคาสินค้าทั้งหมด(เหมือนด้านบน) </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_product"  >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >การจัดส่ง บริการขนส่ง </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_p_name" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >ค่าจัดส่ง </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_p_price" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >ราคารวมทั้งสิ้น ที่ต้องชำระ</label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_price" >
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-sm-offset-2 col-sm-5">
											<input type="submit" name="billrequest_add" value="ยืนยันการเพิ่ม" class="btn btn-success" >
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


