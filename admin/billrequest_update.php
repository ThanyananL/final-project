<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'order_list.php';

if (isset($_GET[billrequest_id])){
	$_SESSION[billrequest_id] =  $_GET[billrequest_id];
}
$billrequest_id =   $_SESSION[billrequest_id];

$billrequest_SL = " SELECT * FROM billrequest WHERE billrequest_id = '$billrequest_id'";
$billrequest_QR = mysqli_query($con,$billrequest_SL);
$billrequest 	= mysqli_fetch_array($billrequest_QR);

if ($_POST['billrequest_Update']) {

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

	$billrequest_Update = "UPDATE `billrequest` SET `billrequest_product_name` = '$billrequest_product_name',`billrequest_product_amount` = '$billrequest_product_amount',`billrequest_product_price` = '$billrequest_product_price',`billrequest_product_amount_price` = '$billrequest_product_amount_price',`billrequest_price` = '$billrequest_price',`billrequest_p_price` = '$billrequest_p_price',`billrequest_p_name` = '$billrequest_p_name',`billrequest_p_name` = '$billrequest_p_name',`billrequest_product` = '$billrequest_product',`billrequest_package` = '$billrequest_package',`billrequest_member_email` = '$billrequest_member_email',`billrequest_member_phone` = '$billrequest_member_phone',`billrequest_member_zipcode` = '$billrequest_member_zipcode',`billrequest_member_address` = '$billrequest_member_address',`billrequest_order_id` = '$billrequest_order_id',`billrequest_date` = '$billrequest_date',`billrequest_member_name` = '$billrequest_member_name' WHERE `billrequest_id` = '$_SESSION[billrequest_id]'";
	$billrequest_Reult = mysqli_query($con,$billrequest_Update);
	if (!$billrequest_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($billrequest_Reult) {
		echo"<script>   window.location='billrequest_one.php?UPDATE'; </script>";
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
						<h3>  แก้ไขใบเสร็จ : <span class="text-primary bold"> <?php echo $billrequest[billrequest_bank]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="billrequest_one.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								กรอกรายละเอียด " ใบเสร็จ " ที่ต้องการแก้ไข
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-sm-2" >เลขที่ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_order_id" value="<? echo $billrequest[billrequest_order_id]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >วันที่ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_date" value="<? echo $billrequest[billrequest_date]; ?>" >
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-2" >นามลูกค้า </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_member_name" value="<? echo $billrequest[billrequest_member_name]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >ที่อยู่ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_member_address" value="<? echo $billrequest[billrequest_member_address]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >รหัสไปรษณีย์ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_member_zipcode" value="<? echo $billrequest[billrequest_member_zipcode]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >เบอร์มือถือ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_member_phone" value="<? echo $billrequest[billrequest_member_phone]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >อีเมล์ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_member_email" value="<? echo $billrequest[billrequest_member_email]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >เลขพัสดุ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_package" value="<? echo $billrequest[billrequest_package]; ?>" >
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-2" >รายการ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_product_name" value="<? echo $billrequest[billrequest_product_name]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >จำนวน </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_product_amount" value="<? echo $billrequest[billrequest_product_amount]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >หน่วยละ </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_product_price" value="<? echo $billrequest[billrequest_product_price]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >จำนวนเงิน </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_product_amount_price" value="<? echo $billrequest[billrequest_product_amount_price]; ?>" >
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-sm-2" >รวม </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_product" value="<? echo $billrequest[billrequest_product]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >การจัดส่ง </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_p_name" value="<? echo $billrequest[billrequest_p_name]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >ค่าจัดส่ง </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_p_price" value="<? echo $billrequest[billrequest_p_price]; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" >ราคารวมทั้งสิ้น </label>
										<div class="col-sm-5">
											<input type="text" class="form-control"  name="billrequest_price" value="<? echo $billrequest[billrequest_price]; ?>" >
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-sm-offset-2 col-sm-5">
											<input type="hidden" name="billrequest_Update" value="x">
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


