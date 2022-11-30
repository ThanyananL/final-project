<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'payment.php';

$Row = "SELECT * FROM payment ";
$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_page = 20;   // Per page
$page = $_GET["page"];
if (isset($_GET[page])){
	$_SESSION[numpage] =  $_GET[page];
}
else{
	$_SESSION[numpage] =  '1';
}
if(!$_GET["page"]){
	$page=1;
}
$Prev_page = $page-1;
$Next_page = $page+1;
$page_Start = (($Per_page*$page)-$Per_page);
if($Num_Rows<=$Per_page){
	$Num_pages =1;
}
else if(($Num_Rows % $Per_page)==0){
	$Num_pages =($Num_Rows/$Per_page) ;
}
else{
	$Num_pages =($Num_Rows/$Per_page)+1;
	$Num_pages = (int)$Num_pages;
}

$i=$page_Start+1;

$payment_SL = $Row . " ORDER BY payment_id DESC LIMIT $page_Start , $Per_page ";
$payment_QR 	= mysqli_query($con,$payment_SL);

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
						<h3>  จัดการ แจ้งโอนเงิน  </h3>
						<hr>
					</div>
				</div>

				<? include 'index_Alerts.php'; ?>

				<div class="row">


					<div class="col-md-12">

						<div class="panel panel-default">
							<div class="panel-heading">
								การแจ้งโอนเงินทั้งหมด <span class="badge"> <? echo "$Num_Rows"; ?></span>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th></th>
												<th>รูปหลักฐาน</th>
												<th>สถานะใบสั่งซื้อ</th>
												<th>เลขใบสั่งซื้อ</th>
												<th>ยอดชำระ</th>
												<th>วันเวลา ที่แจ้ง</th>
												<th>ดูข้อมูล</th>
											</tr>
										</thead>
										<tbody>
											<?
											while ($payment 	= mysqli_fetch_array($payment_QR)) {

												$order_list_SL = " SELECT * FROM order_list WHERE order_list_id = '$payment[order_list_id]'";
												$order_list_Re = mysqli_query($con,$order_list_SL);
												$order_list 	= mysqli_fetch_array($order_list_Re);

												

												$order_list_who_SL 	= " SELECT * FROM order_list_who WHERE order_list_who_id = '$order_list[order_list_who_id]'";
												$order_list_who_QR 	= mysqli_query($con,$order_list_who_SL);
												$order_list_who 	= mysqli_fetch_array($order_list_who_QR);	
												?>
												<tr>
													<td>
														<p><?php echo $i; ?></p>
													</td>
													<td>
														<? 
														if ($payment[notification_id]==1) {														
															?>
															<span class="glyphicon glyphicon-bell size12 text-red"></span>
															<?
														}
														?>
													</td>
													<td >
														<a href="payment_one.php?payment_id=<?php echo $payment[payment_id]; ?>">
															<img style="width: 50px;height: 60px;" src="../cloud/payment_photo/<?php echo $payment[payment_photo]; ?>" class="boxsha"  />
														</a>
													</td>
													<td>
														<? include 'index_order_list_status.php'; ?>
													</td>
													<td>
														<p><?php echo $payment[order_list_id]; ?></p>
													</td>
													<td>
														<p>
															<?  echo number_format($order_list[order_list_price]); ?>
														</p>
													</td>
													<td>
														<p><?php echo displaydate($payment[payment_date])."  ".$payment[payment_time]; ?></p>
													</td>
													<td>
														<a href="payment_one.php?payment_id=<?php echo $payment[payment_id]; ?>" class="btn btn-primary">
															<span class="glyphicon glyphicon-zoom-in"></span> 
															ตรวจสอบ
														</a>
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
							<div class="panel-footer">
								<? include 'index_pagenum.php'; ?>
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


