<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'weight.php';


$Row = "SELECT * FROM weight";
$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_Page = 20;   // Per Page
$Page = $_GET["Page"];
if(!$_GET["Page"]){
	$Page=1;
}
$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page){
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0){
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}
$i=$Page_Start+1;

$weight_SL = " SELECT * FROM weight ORDER BY weight_price ASC LIMIT $Page_Start , $Per_Page ";
$weight_QR 	= mysqli_query($con,$weight_SL);

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
						<h3>  จัดการราคาน้ำหนักค่าจัดส่ง </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="weight_add.php" class="btn btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span>
							เพิ่มราคาน้ำหนักค่าจัดส่ง
						</a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								ราคาน้ำหนักค่าจัดส่งทั้งหมด <span class="badge"> <? echo "$Num_Rows"; ?></span> 
								<?
								if ($Num_Rows=='0') {
									?>
									<span class="text-red">
										คุณยังไม่มีข้อมูลนี้กรุณาเพิ่ม
									</span>
									<?
								}
								?>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>ราคาค่าจัดส่ง</th>
												<th>น้ำหนักต่ำสุด (กรัม) </th>
												<th>น้ำหลักสูงสุด (กรัม) </th>
												<th>รายละเอียด, อัพเดท, ลบ</th>
											</tr>
										</thead>
										<tbody>
											<?
											while ($weight 	= mysqli_fetch_array($weight_QR)) {
												?>
												<tr>
													<td><? echo $i; ?></td>
													<td>
														<? echo number_format($weight[weight_price]); ?>
													</td>
													<td>
														<? echo number_format($weight[weight_min]); ?>
													</td>
													<td>
														<? echo number_format($weight[weight_max]); ?>
													</td>
													<td>
														<a href="weight_update.php?weight_id=<?php echo $weight[weight_id]; ?>" class="btn btn-info">
															<span class="glyphicon glyphicon-wrench"></span>
															อัพเดท
														</a>
														<a href="weight_del.php?weight_id=<?php echo $weight[weight_id]; ?>" class="btn btn-danger" onclick="return confirm(' ยืนยันการลบข้อมูล ')">
															<span class="glyphicon glyphicon-remove-sign"></span>
															ลบ 
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
								<? include 'index_Pagenum.php'; ?>
							</div>
						</div>
						<!-- panel -->
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


