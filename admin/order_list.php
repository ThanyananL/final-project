<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'order_list.php';


$Q = 1;
$Row = "SELECT * FROM order_list WHERE ";

if (isset($_GET[keyword])&&trim($_GET[keyword])!='') {


	$keyword = trim($_GET['keyword']);
	$keyword= str_replace("'","&#39;",$keyword);
	$keyword= str_replace("\"","&quot;",$keyword);

	if ($Q==1) {
		$Row .= " ( order_list_id LIKE '%$keyword%' OR order_list_package LIKE '%$keyword%' OR order_list_p_name LIKE '%$keyword%' OR order_list_p_price LIKE '%$keyword%' OR order_list_p_link LIKE '%$keyword%' OR order_list_product LIKE '%$keyword%' OR order_list_member_name LIKE '%$keyword%' OR order_list_member_email LIKE '%$keyword%' OR order_list_member_phone LIKE '%$keyword%' OR order_list_member_address LIKE '%$keyword%'   OR order_list_member_zipcode LIKE '%$keyword%'  ) ";
		$Q++;
	}
	else{
		$Row .= " AND  ( order_list_id LIKE '%$keyword%' OR order_list_package LIKE '%$keyword%' OR order_list_p_name LIKE '%$keyword%' OR order_list_p_price LIKE '%$keyword%' OR order_list_p_link LIKE '%$keyword%' OR order_list_product LIKE '%$keyword%' OR order_list_member_name LIKE '%$keyword%' OR order_list_member_email LIKE '%$keyword%' OR order_list_member_phone LIKE '%$keyword%' OR order_list_member_address LIKE '%$keyword%'   OR order_list_member_zipcode LIKE '%$keyword%'  ) ";
		$Q++;
	}

}

if (isset($_GET[order_list_status])&&$_GET[order_list_status]!='') {
	$order_list_status   = $_GET[order_list_status];
	if ($Q==1) {
		$Row .= " ( order_list_status = '$order_list_status' ) ";
		$Q++;
	}
	else{
		$Row .= " AND ( order_list_status = '$order_list_status' ) ";
		$Q++;
	}
}


if ($Q==1) {
	$Row = "SELECT * FROM  order_list WHERE  order_list_status !='5' ";
}
else{
	$Row .= " AND  (  order_list_status !='5') ";
	$Q++;
}



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

$order_list_SL = $Row."  ORDER BY order_list_id desc LIMIT $page_Start , $Per_page ";
$order_list_QR 	= mysqli_query($con,$order_list_SL);

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
						<h3>  จัดการ รายการสั่งซื้อ   </h3>
						<hr>
					</div>
					<div class="col-md-6 br-margin2">
						<form class="form-inline" method="get">
							<a  onclick="goBack()" class="btn btn-default br"> กลับ </a>
							<a  href="order_list.php" class="btn btn-default br"> รายการสั่งซื้อทั้งหมด </a>
							<input type="text" class="form-control br" placeholder="ค้นหารายการสั่งซื้อ" name="keyword" >
							<select class="form-control br"  name="order_list_status">
									<option value="">สถานะใบสั่งซื้อ</option>
									<?
									$order_list_status_SLX2 = " SELECT * FROM order_list_status WHERE order_list_status_id != '5'";
									$order_list_status_QRX2 	= mysqli_query($con,$order_list_status_SLX2);
									while ($order_list_statusX2 	= mysqli_fetch_array($order_list_status_QRX2)) {
										?>
										<option value="<?php echo $order_list_statusX2[order_list_status_id]; ?>"><?php echo $order_list_statusX2[order_list_status_name]; ?></option>
										<?
									}
									?>
								</select>
							<input type="submit" name="SubmitSearch" value="ค้นหา" class="btn btn-primary br">
						</form>	
					</div>
					<div class="col-md-6 br">
						<a  href="billrequest.php" class="btn btn-primary"> ใบเสร็จแก้ไขเอง </a>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?
								if (isset($_GET[keyword])&&$_GET[keyword]!='') {
									?>
									ค้นหา : <span class="text-primary"><? echo $keyword; ?></span>	
									<?
								}
								if (isset($_GET[order_list_status])&&$_GET[order_list_status]!='') {
									$order_list_status_SL = " SELECT * FROM order_list_status WHERE order_list_status_id = '$_GET[order_list_status]'";
									$order_list_status_QR = mysqli_query($con,$order_list_status_SL);
									$order_list_status 	= mysqli_fetch_array($order_list_status_QR);
									?>
									สถานะการสั่งซื้อ : <span class="text-primary"><? echo "$order_list_status[order_list_status_name]"; ?></span>
									<?
								}
								if ($Q==1) {
									echo "รายการสั่งซื้อ ทั้งหมด";
								}
								?>	
								<span class="badge"> <? echo "$Num_Rows"; ?></span> 
								<?
								if ($Num_Rows=='0') {
									?>
									<span class="text-red">
										ยังไม่มีข้อมูลนี้
									</span>
									<?
								}
								?>
							</div>
							<div class="panel-body">
								<div class="visible-xs"> เลื่อนดูตารางได้ ---> </div>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th></th>
												<th>ชื่อ - นามสกุล</th>
												<th>เลขใบสั่งซื้อ</th>
												<th>สถานะใบสั่งซื้อ</th>
												<th>เลขพัสดุ</th>
												<th>ยอดชำระเงินทั้งหมด</th>
												<th>จำนวนสินค้าทั้งหมด</th>
												<th>วัน เวลาสั่งซื้อ</th>
												<th>รายละเอียด</th>
											</tr>
										</thead>
										<tbody>
											<?
											while ($order_list 	= mysqli_fetch_array($order_list_QR)) {

												$order_list_who_SL 	= " SELECT * FROM order_list_who WHERE order_list_who_id = '$order_list[order_list_who_id]'";
												$order_list_who_QR 	= mysqli_query($con,$order_list_who_SL);
												$order_list_who 	= mysqli_fetch_array($order_list_who_QR);		

												$portage_SL 	= " SELECT * FROM portage WHERE portage_id = '$order_list[portage_id]'";
												$portage_QR 	= mysqli_query($con,$portage_SL);
												$portage 	= mysqli_fetch_array($portage_QR);	

												?>
												<tr>
													<td>
														<p><?php echo $i; ?></p>
													</td>
													<td>
														<? 
														if ($order_list[notification_id]==1) {														
															?>
															<span class="glyphicon glyphicon-bell size12 text-red"></span>
															<?
														}
														?>
													</td>
													<td >
														<p>
															<?php echo $order_list[order_list_member_name]; ?> <br>
														</p>
													</td>
													<td >
														<p><?php echo $order_list[order_list_id]; ?></p>
													</td>
													<td>
														<? include 'index_order_list_status.php'; ?>
													</td>
													<td>
														<p><?php echo $order_list[order_list_package]; ?></p>
														<p><? echo $portage[portage_name]; ?></p>
													</td>
													<td>
														<p title="รวมค่าส่งด้วย"> <?echo number_format($order_list[order_list_price]);?>  บาท  </p>
													</td>
													<td>
														<p><?php echo $order_list[order_list_amount]; ?></p>
													</td>
													<td>
														<p><?php echo displaydate($order_list[order_list_date])."  ".$order_list[order_list_time]; ?></p>
													</td>
													<td>
														<a href="order_list_one.php?order_list_id=<?php echo $order_list[order_list_id]; ?>" class="btn btn-primary"> 
															<span class="glyphicon glyphicon-zoom-in"></span>
															รายละเอียด 
														</a>
													</td>
												</tr>
												<?
												
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


