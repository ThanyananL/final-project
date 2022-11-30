
<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'admin.php';

$Q = 1;
$Row = "SELECT * FROM admin WHERE ";

if (isset($_GET[keyword])&&$_GET[keyword]!='') {
	$keyword = $_GET['keyword'];
	$keyword= str_replace("'","&#39;",$keyword);
	$keyword= str_replace("\"","&quot;",$keyword);
	if ($Q==1) {
		$Row .= " ( admin_name LIKE '%$keyword%' )";
		$Q++;
	}
	else{
		$Row .= " AND  ( admin_name LIKE '%$keyword%' ) ";
		$Q++;
	}
}

if ($Q==1) {
	$Row = "SELECT * FROM admin ";
}
else{
	$Row .= " ";
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

$admin_SL = $Row." ORDER BY admin_id ASC LIMIT $page_Start , $Per_page ";
$admin_QR = mysqli_query($con,$admin_SL);

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
						<h3>  จัดการ      ผู้ดูแลระบบ        </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-6">
						<form class="form-inline" method="get">
							<div class="form-group" style="margin-bottom: 15px;">
								<a href="admin_add.php" class="btn btn-success">
									<span class="glyphicon glyphicon-plus-sign"></span>
									เพิ่ม     ผู้ดูแลระบบ   
								</a>
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<a href="admin.php" class="btn btn-default">
									<span class="glyphicon glyphicon-repeat size12"></span>
								</a>
							</div>
						</form>
					</div>
					<div class="col-md-6 text-right">
						<form class="form-inline" method="get">
							<div class="form-group" style="margin-bottom: 15px;">
								<input type="text"  class="form-control" placeholder="คำค้นหา" name="keyword">
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-search"></span>
									ค้นหา
								</button>
							</div>
						</form>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-6">
										<?
										if (isset($_GET[keyword])&&$_GET[keyword]!='') {
											?>
											ค้นหา : <? echo $keyword; echo " "; ?>
											<?
										}
										if ($Q==1) {
											?>
											ผู้ดูแลระบบ 
											<?
										}
										?>
										<?
										if ($Num_Rows=='0') { echo "( ไม่มีข้อมูลนี้ )"; }
										else{ 
											?>
											<span class="badge"> <? echo "$Num_Rows"; ?></span> 
											<?
										} 
										?>

									</div>
									<div class="col-md-6 text-right" style="margin: -5px;">
										<a class="btn btn-default" onclick="location.reload()">
											รีเฟรชหน้า
										</a>
										<a class="btn btn-default" onclick="goBack()">
											<span class="glyphicon glyphicon-backward">

											</span>
											กลับ
										</a>
										<?
										if ($Q!=1) {
											?>
											<a class="btn btn-default" href="admin.php">
												ผู้ดูแลระบบ
											</a>
											<?
										}
										?>
									</div>
								</div>
							</div>
							<div class="panel-body">

								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th> # </th>
												<th> ชื่อเข้าใช้ (สำหรับล๊อกอิน) </th>
												<th> ชื่อผู้ดูแล </th>
												<th> ระดับ </th>
												<th> รายละเอียด , แก้ไข , ลบ </th>
											</tr>
										</thead>
										<tbody class="row_position">
											<?
											while ($admin 	= mysqli_fetch_array($admin_QR)) {
												?>
												<tr id="<?php echo $admin['admin_id'] ?>">
													<td><? echo $i; ?></td>
													<td>
														<? 
														if (isset($admin[admin_user])&&trim($admin[admin_user])!=''&&$admin[admin_user]!='0') {
															echo $admin[admin_user]; 
														}
														else{
															echo " - ";
														}
														?>
													</td>
													<td>
														<? 
														if (isset($admin[admin_name])&&trim($admin[admin_name])!=''&&$admin[admin_name]!='0') {
															echo $admin[admin_name]; 
														}
														else{
															echo " - ";
														}
														?>
													</td>
													<td>
														<? 
														$admin_degree_SL = " SELECT * FROM admin_degree WHERE admin_degree_id = '$admin[admin_degree_id]'";
														$admin_degree_QR = mysqli_query($con,$admin_degree_SL);
														$admin_degree 	= mysqli_fetch_array($admin_degree_QR);

														if (isset($admin_degree[admin_degree_name])&&trim($admin_degree[admin_degree_name])!=''&&$admin_degree[admin_degree_name]!='0') {
															echo $admin_degree[admin_degree_name]; 
														}
														else{
															echo " - ";
														}

														?>
													</td>
													<td style="width: 300px;">
														<?
														if (trim($login_admin[admin_degree_id])=='1') {
															?>
															<a href="admin_one.php?admin_id=<?php echo $admin[admin_id]; ?>" class="btn btn-sm btn-primary">
																<span class="glyphicon glyphicon-zoom-in"></span>
																รายละเอียด  
															</a>
															<a href="admin_update.php?admin_id=<?php echo $admin[admin_id]; ?>" class="btn btn-sm btn-info">
																<span class="glyphicon glyphicon-edit"></span>
																แก้ไข
															</a>
															<?
														}
														else{
															?>
															<p>
																เฉพาะแอดมินหลัก
															</p>
															<?
														}
														?>
														
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
