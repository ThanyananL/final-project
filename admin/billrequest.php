<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'order_list.php';


$Q = 1;
$Row = "SELECT * FROM billrequest WHERE ";

if (isset($_GET[keyword])&&trim($_GET[keyword])!='') {


	$keyword = trim($_GET['keyword']);
	$keyword= str_replace("'","&#39;",$keyword);
	$keyword= str_replace("\"","&quot;",$keyword);

	if ($Q==1) {
		$Row .= " ( billrequest_id LIKE '%$keyword%' OR billrequest_package LIKE '%$keyword%' OR billrequest_p_name LIKE '%$keyword%' OR billrequest_p_price LIKE '%$keyword%' OR billrequest_p_link LIKE '%$keyword%' OR billrequest_product LIKE '%$keyword%' OR billrequest_member_name LIKE '%$keyword%' OR billrequest_member_email LIKE '%$keyword%' OR billrequest_member_phone LIKE '%$keyword%' OR billrequest_member_address LIKE '%$keyword%'   OR billrequest_member_zipcode LIKE '%$keyword%'  ) ";
		$Q++;
	}
	else{
		$Row .= " AND  ( billrequest_id LIKE '%$keyword%' OR billrequest_package LIKE '%$keyword%' OR billrequest_p_name LIKE '%$keyword%' OR billrequest_p_price LIKE '%$keyword%' OR billrequest_p_link LIKE '%$keyword%' OR billrequest_product LIKE '%$keyword%' OR billrequest_member_name LIKE '%$keyword%' OR billrequest_member_email LIKE '%$keyword%' OR billrequest_member_phone LIKE '%$keyword%' OR billrequest_member_address LIKE '%$keyword%'   OR billrequest_member_zipcode LIKE '%$keyword%'  ) ";
		$Q++;
	}

}

if (isset($_GET[billrequest_status])&&$_GET[billrequest_status]!='') {
	$billrequest_status   = $_GET[billrequest_status];
	if ($Q==1) {
		$Row .= " ( billrequest_status = '$billrequest_status' ) ";
		$Q++;
	}
	else{
		$Row .= " AND ( billrequest_status = '$billrequest_status' ) ";
		$Q++;
	}
}


if ($Q==1) {
	$Row = "SELECT * FROM  billrequest WHERE  billrequest_status !='5' ";
}
else{
	$Row .= " AND  (  billrequest_status !='5') ";
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

$billrequest_SL = $Row."  ORDER BY billrequest_id desc LIMIT $page_Start , $Per_page ";
$billrequest_QR 	= mysqli_query($con,$billrequest_SL);

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
						<h3>  จัดการ ใบเสร็จ   </h3>
						<hr>
					</div>
					<div class="col-md-6 br-margin2">
						<form class="form-inline" method="get">
							<a  href="order_list.php" class="btn btn-default"> กลับ </a>
							<a href="billrequest_add.php" class="btn btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span>
							เพิ่ม ใบเสร็จ 
						</a>
						</form>	
					</div>
					<div class="col-md-6 br-margin2">
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								ใบเสร็จ
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th></th>
												<th>ชื่อ - นามสกุล</th>
												<th>เลขใบสั่งซื้อ</th>
												<th>เลขพัสดุ</th>
												<th>ยอดชำระเงินทั้งหมด</th>
												<th>จำนวนสินค้าทั้งหมด</th>
												<th>รายละเอียด</th>
											</tr>
										</thead>
										<tbody>
											<?
											while ($billrequest 	= mysqli_fetch_array($billrequest_QR)) {

												$billrequest_who_SL 	= " SELECT * FROM billrequest_who WHERE billrequest_who_id = '$billrequest[billrequest_who_id]'";
												$billrequest_who_QR 	= mysqli_query($con,$billrequest_who_SL);
												$billrequest_who 	= mysqli_fetch_array($billrequest_who_QR);		

												$portage_SL 	= " SELECT * FROM portage WHERE portage_id = '$billrequest[portage_id]'";
												$portage_QR 	= mysqli_query($con,$portage_SL);
												$portage 	= mysqli_fetch_array($portage_QR);	

												?>
												<tr>
													<td>
														<p><?php echo $i; ?></p>
													</td>
													<td>
														<? 
														if ($billrequest[notification_id]==1) {														
															?>
															<span class="glyphicon glyphicon-bell size12 text-red"></span>
															<?
														}
														?>
													</td>
													<td >
														<p>
															<?php echo $billrequest[billrequest_member_name]; ?> <br>
														</p>
													</td>
													<td >
														<p><?php echo $billrequest[billrequest_order_id]; ?></p>
													</td>
													<td>
														<p><?php echo $billrequest[billrequest_package]; ?></p>
														<p><? echo $portage[portage_name]; ?></p>
													</td>
													<td>
														<p title="รวมค่าส่งด้วย"> <?echo number_format($billrequest[billrequest_price]);?>  บาท  </p>
													</td>
													<td>
														<p><?php echo $billrequest[billrequest_product_amount]; ?></p>
													</td>
													<td>
														<a href="billrequest_one.php?billrequest_id=<?php echo $billrequest[billrequest_id]; ?>" class="btn btn-primary"> 
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


