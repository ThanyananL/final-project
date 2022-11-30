<? 
include 'index_IncludeAdmin.php'; 

$_SESSION['page'] = 'order_list.php';

if (isset($_GET[billrequest_id])){
	$_SESSION[billrequest_id] =  $_GET[billrequest_id];
}
$billrequest_id =   $_SESSION[billrequest_id] ;

$billrequest_SL = " SELECT * FROM billrequest WHERE billrequest_id = '$billrequest_id'";
$billrequest_QR = mysqli_query($con,$billrequest_SL);
$billrequest 	= mysqli_fetch_array($billrequest_QR);

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
						<h3>  ใบเสร็จ : <span class="text-primary bold"> <?php echo $billrequest[billrequest_order_id]; ?> </span>  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="billrequest.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="billrequest_update.php?billrequest_id=<?php echo $billrequest[billrequest_id]; ?>" class="btn btn-info">
							<span class="glyphicon glyphicon-edit"></span>
							แก้ไข
						</a>
						<a target="_blank" href="billrequest_pdf.php?billrequest_id=<?php echo $billrequest[billrequest_id]; ?>" class="btn btn-success" > ดูใบสั่งซื้อ </a>
						<a target="_blank" href="billrequest_delivery.php?billrequest_id=<?php echo $billrequest[billrequest_id]; ?>" class="btn btn-success" > ดูใบส่งของ </a>
						<a href="billrequest_del.php?billrequest_id=<?php echo $billrequest[billrequest_id]; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล ?  ')"  class="btn btn-danger">
							<span class="glyphicon glyphicon-trash"></span>
							ลบ
						</a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								รายละเอียดใบเสร็จ : <span class="text-primary bold"> <?php echo $billrequest[billrequest_order_id]; ?> </span>
							</div>
							<div class="panel-body">
								<form class="form-horizontal">
									<div class="form-group">
										<label class="control-label col-md-2" > เลขที่</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_order_id]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >วันที่</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_date]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >นามลูกค้า</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_member_name]; ?>
										</label>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-2" > ที่อยู่</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_member_address]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >รหัสไปรษณีย์</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_member_zipcode]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >เบอร์มือถือ</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_member_phone]; ?>
										</label>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-2" > อีเมล์</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_member_email]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >เลขพัสดุ</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_package]; ?>
										</label>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" >รายการ</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_product_name]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >จำนวน</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_product_amount]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >หน่วยละ</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_product_price]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >จำนวนเงิน</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_product_amount_price]; ?>
										</label>
									</div>

									<div class="form-group">
										<label class="control-label col-md-2" >รวม</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_product]; ?>
										</label>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-2" > การจัดส่ง</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_p_name]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >ค่าจัดส่ง</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_p_price]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" >ราคารวมทั้งสิ้น</label>
										<label class="control-label col-md-10 text-left">
											<? echo $billrequest[billrequest_price]; ?>
										</label>
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


