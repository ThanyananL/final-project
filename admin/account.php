<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'account.php';

$Row = "SELECT * FROM account";
$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_Page = 10;   // Per Page
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

$account_SL = " SELECT * FROM account ORDER BY account_id ASC LIMIT $Page_Start , $Per_Page ";
$account_QR 	= mysqli_query($con,$account_SL);

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
						<h3>  จัดการ บัญชีธนาคาร    </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="account_add.php" class="btn btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span>
							เพิ่ม บัญชีธนาคาร 
						</a>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								 บัญชีธนาคาร  ทั้งหมด <span class="badge"> <? echo "$Num_Rows"; ?></span> 
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
												<th>ธนาคาร</th>
												<th>เลขบัญชี</th>
												<th>ชื่อบัญชี</th>
												<th>อัพเดท , ลบ </th>
											</tr>
										</thead>
										<tbody>
											<?
											while ($account 	= mysqli_fetch_array($account_QR)) {
												?>
												<tr>
													<td>
														<p><?php echo $i; ?></p>
													</td>
													<td>
														<p><?php echo $account[account_bank]; ?></p>
													</td>
													<td>
														<p><?php echo $account[account_number]; ?></p>
													</td>
													<td>
														<p><?php echo $account[account_name]; ?></p>
													</td>
													<td>
														<a href="account_one.php?account_id=<?php echo $account[account_id]; ?>" class="btn btn-primary">
															<span class="glyphicon glyphicon-zoom-in"></span>
															รายละเอียด  
														</a>
														<a href="account_update.php?account_id=<?php echo $account[account_id]; ?>" class="btn btn-info">
															<span class="glyphicon glyphicon-edit"></span>
															แก้ไข
														</a>
														<a href="account_del.php?account_id=<?php echo $account[account_id]; ?>" onclick="return confirm(' ยืนยันการลบข้อมูล ?  ')"  class="btn btn-danger">
															<span class="glyphicon glyphicon-trash"></span>
															ลบ
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
								<? include 'index_Pagenum.php'; ?>
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


