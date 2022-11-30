<? 
include 'index_IncludeAdmin.php'; 

$_SESSION['page'] = 'payment.php';

if (isset($_GET[payment_id])){
	$_SESSION[payment_id] =  $_GET[payment_id];
}
$payment_id =   $_SESSION[payment_id] ;

$payment_SL = " SELECT * FROM payment WHERE payment_id = '$payment_id'";
$payment_QR = mysqli_query($con,$payment_SL);
$payment 	= mysqli_fetch_array($payment_QR);

$order_list_SL = " SELECT * FROM order_list WHERE order_list_id = '$payment[order_list_id]'";
$order_list_QR = mysqli_query($con,$order_list_SL);
$order_list 	= mysqli_fetch_array($order_list_QR);

$order_list_who_SL 	= " SELECT * FROM order_list_who WHERE order_list_who_id = '$order_list[order_list_who_id]'";
$order_list_who_QR 	= mysqli_query($con,$order_list_who_SL);
$order_list_who 	= mysqli_fetch_array($order_list_who_QR);		


$order_list_status_SL = " SELECT * FROM order_list_status WHERE order_list_status_id = '$order_list[order_list_status]' ";
$order_list_status_QR 	= mysqli_query($con,$order_list_status_SL);
$order_list_status 	= mysqli_fetch_array($order_list_status_QR);

$account_SL = " SELECT * FROM account WHERE account_id = '$payment[account_id]'";
$account_QR = mysqli_query($con,$account_SL);
$account 	= mysqli_fetch_array($account_QR);


if ($_POST['order_list_status_update']) {

	$order_list_status = $_POST['order_list_status'];


	if ($_POST[order_list_status]!=$order_list[order_list_status]) {

		$order_list_Update = "UPDATE `order_list` SET `order_list_status` = '$order_list_status' WHERE `order_list_id` = '$payment[order_list_id]'";
		$order_list_Reult = mysqli_query($con,$order_list_Update);

		if (!$order_list_Reult) {
			echo"<script>alert('order_list_Reult 42 '); window.history.back(); </script>";
		}
		if ($order_list_Reult) {

			$order_list_SL = " SELECT * FROM order_list WHERE order_list_id = '$payment[order_list_id]'";
			$order_list_QR = mysqli_query($con,$order_list_SL);
			$order_list 	= mysqli_fetch_array($order_list_QR);

			$order_list_status_SL = " SELECT * FROM order_list_status WHERE order_list_status_id = '$order_list[order_list_status]' ";
			$order_list_status_QR 	= mysqli_query($con,$order_list_status_SL);
			$order_list_status 	= mysqli_fetch_array($order_list_status_QR);

			if ($order_list[order_list_status]==3) {
				$member_point = $member[member_point] + $order_list[order_listPoint];

				$member_Update = "UPDATE `member` SET `member_point` = '$member_point' WHERE `member_id` = '$member[member_id]'";
				$member_Reult = mysqli_query($con,$member_Update);
			}
			if ($order_list[order_list_status]==2) {
				$member_point = $member[member_point] - $order_list[order_listPoint];

				$member_Update = "UPDATE `member` SET `member_point` = '$member_point' WHERE `member_id` = '$member[member_id]'";
				$member_Reult = mysqli_query($con,$member_Update);
			}
			if ($order_list[order_list_status]==4) {

				$or_product_SL = " SELECT * FROM or_product WHERE order_list_id = '$payment[order_list_id]'";
				$or_product_QR 	= mysqli_query($con,$or_product_SL);
				while ($or_product 	= mysqli_fetch_array($or_product_QR)) {
					$product_gen_SL = " SELECT * FROM product_gen WHERE product_gen_id = '$or_product[product_gen_id]'";
					$product_gen_QR 	= mysqli_query($con,$product_gen_SL);
					$product_gen 	= mysqli_fetch_array($product_gen_QR);
					
					$product_gen_store = $or_product[Amoutproduct_gen]+$product_gen[product_gen_store];

					$product_gen_Update = "UPDATE `product_gen` SET `product_gen_store` = '$product_gen_store'  WHERE `product_gen_id` = '$or_product[product_gen_id]'";
					$product_gen_Reult = mysqli_query($con,$product_gen_Update);
				}

			}

			$dateData=time();

			$strTo = $order_list[order_list_member_email];
			$strSubject = "แจ้งสถานะการสั่งซื้อ - ". $fixed[fixed_website];
			$strHeader = "Content-type: text/html; charset=utf-8\n";
			$strHeader .= "From: ".$fixed[fixed_sent]."\n";
			$strMessage = "";

			$strMessage .= "<h3> เรียนคุณ : ".$order_list[order_list_member_name]."  </h3>";
			$strMessage .= "<h3> สถานะใบสั่งซื้อของคุณคือ : ".$order_list_status[order_list_status_name]."</h3>";
			$strMessage .= "<h3> อัพเดทเมื่อ : ".thai_date_and_time($dateData)."</h3>";
			$strMessage .= "<p> เลขใบสั่งซื้อ :  ".$order_list[order_list_id]."  </p>";
			$strMessage .= "<p> จำนวนสินค้า : ".$order_list[order_list_amount]." </p>";
			$strMessage .= "<p> การจัดส่ง : ".$order_list[order_list_p_name]."  </p>";
			$strMessage .= "<p> ค่าจัดส่ง : ".$order_list[order_list_p_price]." บาท </p>";
			$strMessage .= "<p> ราคาสินค้า : ".number_format($order_list[order_list_product])." บาท </p>";
			$strMessage .= "<p> <h4> ยอดชำระเงินทั้งหมด : ".number_format($order_list[order_list_price])." บาท </h4>";
			$strMessage .= "<br>";
			$strMessage .= "<p>  ผู้ซื้อ : ".$order_list[order_list_member_name]."  </p>";
			$strMessage .= "<p>  อีเมล : ".$order_list[order_list_member_email]."  </p>";
			$strMessage .= "<p>  เบอร์ติดต่อ : ".$order_list[order_list_member_phone]."  </p>";
			$strMessage .= "<p>  ที่อยู่จัดส่ง : ".$order_list[order_list_member_address]."  </p>";
			$strMessage .= "<p>  รหัสไปรษณีย์ : ".$order_list[order_list_member_zipcode]."  </p>";
			$strMessage .= "<p>  วันเวลาที่สั่งซื้อ : ".displaydate($order_list[order_list_date])."  ".$order_list[order_list_time]."  </p>";
			$strMessage .= "<p><b> ".$fixed[fixed_website]." </b> <p>";
			$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 

			echo"<script>   window.location='payment_one.php?UPDATE'; </script>";

		}

	}
	else{
		echo"<script>   window.location='payment_one.php'; </script>";
	}


	

}

if ($_POST['order_list_package_Update']) {

	$order_list_package = $_POST['order_list_package'];

	if ($_POST[order_list_package]!=$order_list[order_list_package]) {

		$order_list_package = $_POST['order_list_package'];
		$order_list_Update = "UPDATE `order_list` SET `order_list_package` = '$order_list_package' WHERE `order_list_id` = '$order_list[order_list_id]'";
		$order_list_Reult = mysqli_query($con,$order_list_Update);

		if (!$order_list_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}
		if ($order_list_Reult) {

			$order_list_SL = " SELECT * FROM order_list WHERE order_list_id = '$payment[order_list_id]'";
			$order_list_QR = mysqli_query($con,$order_list_SL);
			$order_list 	= mysqli_fetch_array($order_list_QR);

			$order_list_status_SL = " SELECT * FROM order_list_status WHERE order_list_status_id = '$order_list[order_list_status]' ";
			$order_list_status_QR 	= mysqli_query($con,$order_list_status_SL);
			$order_list_status 	= mysqli_fetch_array($order_list_status_QR);

			$dateData=time();

			$strTo = $order_list[order_list_member_email];
			$strSubject = "แจ้งเลขพัสดุ - ". $fixed[fixed_website];
			$strHeader = "Content-type: text/html; charset=utf-8\n";
			$strHeader .= "From: ".$fixed[fixed_sent]."\n";
			$strMessage = "";

			$strMessage .= "<h3> เรียนคุณ : ".$order_list[order_list_member_name]." </h3>";
			$strMessage .= "<h3> เลขพัสดุคือ : ".$order_list[order_list_package]."</h3>";
			$strMessage .= "<h3> การจัดส่ง : ".$order_list[order_list_p_name]."  </h3>";
			$strMessage .= "<h3> ติดตามพัสดุ ". $order_list[order_list_p_link]."</h3> ";
			$strMessage .= "<h3> สถานะใบสั่งซื้อ : ".$order_list_status[order_list_status_name]."</h3>";
			$strMessage .= "<h3> อัพเดทเมื่อ : ".thai_date_and_time($dateData)."</h3>";
			$strMessage .= "<p> เลขใบสั่งซื้อ :  ".$order_list[order_list_id]."  </p>";
			$strMessage .= "<p> จำนวนสินค้า : ".$order_list[order_list_amount]." </p>";
			$strMessage .= "<p> ค่าจัดส่ง : ".$order_list[order_list_p_price]." บาท </p>";
			$strMessage .= "<p> ราคาสินค้า : ".number_format($order_list[order_list_product])." บาท </p>";
			$strMessage .= "<p> <h4> ยอดชำระเงินทั้งหมด : ".number_format($order_list[order_list_price])." บาท </h4>";
			$strMessage .= "<p>  ผู้ซื้อ : ".$order_list[order_list_member_name]."  </p>";
			$strMessage .= "<p>  อีเมล : ".$order_list[order_list_member_email]."  </p>";
			$strMessage .= "<p>  เบอร์ติดต่อ : ".$order_list[order_list_member_phone]."  </p>";
			$strMessage .= "<p>  ที่อยู่จัดส่ง : ".$order_list[order_list_member_address]."  </p>";
			$strMessage .= "<p>  รหัสไปรษณีย์ : ".$order_list[order_list_member_zipcode]."  </p>";
			$strMessage .= "<p>  วันเวลาที่สั่งซื้อ : ".displaydate($order_list[order_list_date])."  ".$order_list[order_list_time]."  </p>";
			$strMessage .= "<p><b> ".$fixed[fixed_website]." </b> <p>";
			$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);  

			echo"<script>   window.location='payment_one.php?UPDATE'; </script>";

		}


	}
	else{
		echo"<script>   window.location='payment_one.php'; </script>";
	}

}

// ----

if ($payment[notification_id]==1) {
	$payment_notificatio_id = $_POST['payment_notificatio_id'];
	$payment_notificatio_update = "UPDATE `payment` SET `notification_id` = '2' WHERE `payment_id` = '$payment_id'";
	$payment_notificatio_Reult = mysqli_query($con,$payment_notificatio_update);
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
						<h3> 
							แจ้งชำระเงิน เลขใบสั่งซื้อ : <span class="text-primary bold"> <? echo $order_list[order_list_id]; ?> </span>  
							<span class="text-danger">
								-> <? echo $order_list_status[order_list_status_name]; ?>
							</span>
						</h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>

				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="payment.php?page=<? echo $_SESSION[numpage]; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
						<a href="payment_del.php?payment_id=<?php echo $payment[payment_id]; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล  ? ')"  class="btn btn-danger">
							<span class="glyphicon glyphicon-trash"></span>
							ลบ
						</a>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading"> หลักฐานการโอนเงิน  </div>
							<div class="panel-body">
								<img  src="../cloud/payment_photo/<?php echo $payment[payment_photo]; ?>" class="boxsha" style="max-width: 100%;"  />
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								รายการสินค้า
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<th>สินค้า</th>
												<th></th>
												<th>ราคา</th>
												<th>จำนวน</th>
											</thead>
											<tbody>
												<?php
												$or_product_SL = " SELECT * FROM or_product WHERE order_list_id = '$order_list[order_list_id]'";
												$or_product_QR 	= mysqli_query($con,$or_product_SL);
												$i=1;
												while ($or_product 	= mysqli_fetch_array($or_product_QR)) {

													$product_Sl = "SELECT * FROM product WHERE product_id = '$or_product[product_id]'";
													$product_Qr = mysqli_query($con,$product_Sl);
													$product = mysqli_fetch_array($product_Qr);

													?>
													<tr>
														<td>
															<?
															echo "<a target='_blank' href='http://".$fixed[fixed_website]."/product_detail.php?product_id=".$product[product_id]."'>";
															?>
															<img  src="../cloud/product_photo/<?php echo $product[product_photo]; ?>"   style="height: 50px;width: 50px;"  />
															<?
															echo "</a>";
															?>
														</td>
														<td>
															<?php echo $product[product_name];?>
														</td>
														<td>
															<?
															echo number_format($product[product_price]); 
															?>

														</td>
														<td>
															<?php echo $or_product[product_amount];?>
														</td>
													</tr>
													<?php
													$i++;
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-5">
										รายละเอียดการแจ้งชำระเงิน 
									</div>
									<div class="col-md-7 text-right">
										<a href="" class="btn btn-info"  data-toggle="modal" data-target="#order_list_status_update" data-whatever="@mdo">
											<span class="glyphicon glyphicon-edit"></span>
											แก้ไขสถานะ ใบสั่งซื้อ
										</a>
										<a href="" class="btn btn-info"  data-toggle="modal" data-target="#order_list_package_Update" data-whatever="@mdo">
											<span class="glyphicon glyphicon-edit"></span>
											แก้ไข เลขพัสดุ
										</a>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post">
									<div class="form-group">
										<label class="control-label col-md-3"> วัน เวลา การแจ้ง</label>
										<label class="control-label col-md-6 text-left">
											<?php echo displaydate($payment[payment_date])."  ".$payment[payment_time]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > เลขใบสั่งซื้อ</label>
										<label class="control-label col-md-6 text-left">
											<? echo $order_list[order_list_id]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > บัญชีธนาคาร</label>
										<label class="control-label col-md-6 text-left">
											<? echo $account[account_bank]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" >เลขบัญชี</label>
										<label class="control-label col-md-6 text-left">
											<? echo $account[account_number]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" >ชื่อบัญชี</label>
										<label class="control-label col-md-6 text-left">
											<? echo $account[account_name]; ?>
										</label>
									</div>
								</form>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading"> ยอดเงิน  </div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<h4> จำนวน :  <? echo $order_list[order_list_amount]; ?>  </h4>
										<h4> น้ำหนัก : <?php echo number_format($order_list[order_list_weight]); ?> กรัม  (<? echo $order_list[order_list_weight]/1000; ?> กิโลกรัม )  </h4>
										<h4> ราคารวม : <?php echo number_format($order_list[order_list_product]); ?> บาท</h4>
										<h4> ค่าจัดส่ง :  <?php echo number_format($order_list[order_list_p_price]); ?> บาท</h4>
										<h4 class="bold"> ยอดชำระเงินทั้งหมด : <?php echo number_format($order_list[order_list_price]); ?> บาท</h4>
										<p><? echo $order_list[order_list_cash_on_name]; ?></p>
									</div>
								</div>
							</div>
						</div>


						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-5">
										รายละเอียดใบสั่งซื้อ : <span class="text-primary bold"> <? echo $order_list[order_list_id]; ?> </span>
									</div>
									<div class="col-md-7 text-right">

									</div>
								</div>
								<div class="modal fade" id="order_list_package_Update" tabindex="-1" role="dialog" aria-labelledby="order_list_package_Model">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<form  method="post" class="form-horizontal">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="order_list_package_Model">
														แก้ไข เลขพัสดุ <span class="text-primary">(เลขใบสั่งซื้อ <? echo $order_list[order_list_id]; ?>) </span> 
													</h4>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<label class="control-label col-md-4" >เลขพัสดุ </label>
														<div class="col-md-6">
															<input type="text" class="form-control" name="order_list_package" value="<? echo $order_list[order_list_package]; ?>"> 
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button  onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit" class="btn btn-info">
														<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
													</button>
													<input type="hidden" name="order_list_package_Update" value="x">
													<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="modal fade" id="order_list_status_update" tabindex="-1" role="dialog" aria-labelledby="order_list_status_Model">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<form  method="post" class="form-horizontal">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="order_list_status_Model"> แก้ไขสถานะ  <span class="text-primary">(เลขใบสั่งซื้อ <? echo $order_list[order_list_id]; ?>) </span> </h4>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<label class="control-label col-md-4" >สถานะใบสั่งซื้อ </label>
														<div class="col-md-6">
															<select class="form-control"  name="order_list_status">
																<option value="<?php echo $order_list_status[order_list_status_id]; ?>"><? echo $order_list_status[order_list_status_name]; ?></option>
																<?
																$order_list_status_sql = " SELECT * FROM order_list_status WHERE order_list_status_id != '$order_list_status[order_list_status_id]' ORDER BY order_list_status_sort ASC";
																$order_list_status_re 	= mysqli_query($con,$order_list_status_sql);
																while ($order_list_status_2 	= mysqli_fetch_array($order_list_status_re)) {
																	?>
																	<option value="<?php echo $order_list_status_2[order_list_status_id]; ?>"><?php echo $order_list_status_2[order_list_status_name]; ?></option>
																	<?
																}
																?>
															</select>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button  onclick="return confirm('ยืนยันการแก้ไข ? ')" type="submit" class="btn btn-info">
														<span class="glyphicon glyphicon-floppy-disk"></span> บันทึกการแก้ไข
													</button>
													<input type="hidden" name="order_list_status_update" value="x">
													<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<form class="form-horizontal" method="post" style="padding: 10px;">
											<form class="form-horizontal" method="post" style="padding: 10px;">
												<div class="form-group">
													<label class="control-label col-md-5" > สถานะ ใบสั่งซื้อ</label>
													<label class="control-label col-md-7 text-left">
														<? echo $order_list_status[order_list_status_name]; ?>
													</label>
												</div>
												<div class="form-group">
													<label class="control-label col-md-5" > เลขใบสั่งซื้อ</label>
													<label class="control-label col-md-7 text-left">
														<? echo $order_list[order_list_id]; ?>
													</label>
												</div>
												<div class="form-group">
													<label class="control-label col-md-5" > วิธีชำระเงิน </label>
													<label class="control-label col-md-7 text-left">
														<? echo $order_list[order_list_cash_on_name]; ?>
													</label>
												</div>
												<div class="form-group">
													<label class="control-label col-md-5" > ระดับ</label>
													<label class="control-label col-md-7 text-left">
														<? echo $order_list_who[order_list_who_name]; ?>
													</label>
												</div>
												<div class="form-group">
													<label class="control-label col-md-5" > จำนวนสินค้า</label>
													<label class="control-label col-md-7 text-left">
														<? echo $order_list[order_list_amount]; ?> ชิ้น
													</label>
												</div>
												<div class="form-group">
													<label class="control-label col-md-5" > น้ำหนักสินค้า</label>
													<label class="control-label col-md-7 text-left">
														<? echo number_format($order_list[order_list_weight]); ?> กรัม   (<? echo $order_list[order_list_weight]/1000; ?> กิโลกรัม ) 
													</label>
												</div>
												<div class="form-group">
													<label class="control-label col-md-5" > เลขพัสดุ</label>
													<label class="control-label col-md-7 text-left">
														<? echo $order_list[order_list_package]; ?> 
													</label>
												</div>
												<div class="form-group">
													<label class="control-label col-md-5" >  การจัดส่ง </label>
													<label class="control-label col-md-7 text-left">
														<p>
															<? echo $order_list[order_list_p_name]; ?>
														</p>
														<p>
															( <? echo $order_list[order_list_p_price]; ?> บาท )
														</p>
														<p>
															<a  href="http://<? echo $order_list[order_list_p_link]; ?>" target="_blank"> ติดตามพัสดุ </a>
														</p>
													</label>
												</div>
												<div class="form-group">
													<label class="control-label col-md-5" > ราคาสินค้า</label>
													<label class="control-label col-md-7 text-left">
														<? echo number_format($order_list[order_list_product]); ?> บาท 
													</label>
												</div>
												<div class="form-group">
													<label class="control-label col-md-5" > ยอดชำระเงินทั้งหมด</label>
													<label class="control-label col-md-7 text-left text-red" >
														<b>
															<?php echo number_format($order_list[order_list_price]); ?> บาท 
														</b>
													</label>
												</div>
											</form>
										</form>
									</div>
									<div class="col-md-6">
										<form class="form-horizontal" method="post" style="padding: 10px;">
											<div class="form-group">
												<label class="control-label col-md-5" >  ชื่อ-นามสกุล </label>
												<label class="control-label col-md-7 text-left">
													<? echo $order_list[order_list_member_name]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-5" >อีเมล</label>
												<label class="control-label col-md-7 text-left">
													<? echo $order_list[order_list_member_email]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-5" >เบอร์ติดต่อ</label>
												<label class="control-label col-md-7 text-left">
													<? echo $order_list[order_list_member_phone]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-5" >ที่อยู่จัดส่ง</label>
												<label class="control-label col-md-7 text-left">
													<? echo $order_list[order_list_member_address]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-5" >รหัสไปรษณีย์</label>
												<label class="control-label col-md-7 text-left">
													<? echo $order_list[order_list_member_zipcode]; ?>
												</label>
											</div>
											<div class="form-group">
												<label class="control-label col-md-5" >เวลาสั่งซื้อ</label>
												<label class="control-label col-md-7 text-left">
													<?php echo displaydate($order_list[order_list_date])."  ".$order_list[order_list_time]; ?>
												</label>
											</div>
										</form>
									</div>
								</div>
								<!-- row -->
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


