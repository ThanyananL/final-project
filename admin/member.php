<? 
include 'index_IncludeAdmin.php'; 

$Q = 1;
$Row = "SELECT * FROM member WHERE ";
$_SESSION['page'] = 'member.php';
if (isset($_GET[TextSearch])&&$_GET[TextSearch]!='') {
	$TextSearch = $_GET['TextSearch'];
	$TextSearch= str_replace("'","&#39;",$TextSearch);
	$TextSearch= str_replace("\"","&quot;",$TextSearch);
	if ($Q==1) {
		$Row .= " ( member_name LIKE '%$TextSearch%'    OR member_email LIKE '%$TextSearch%'    OR member_address LIKE '%$TextSearch%'  OR member_zipcode LIKE '%$TextSearch%' OR member_phone LIKE '%$TextSearch%'   )";
		$Q++;
	}
	else{
		$Row .= " AND  ( member_name LIKE '%$TextSearch%'    OR member_email LIKE '%$TextSearch%'    OR member_address LIKE '%$TextSearch%' OR member_zipcode LIKE '%$TextSearch%' OR member_phone LIKE '%$TextSearch%'  ) ";
		$Q++;
	}
}
if ($Q==1) {
	$Row = "SELECT * FROM member ";
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

$member_SL = $Row ." ORDER BY member_id DESC LIMIT $page_Start , $Per_page ";
$member_QR 	= mysqli_query($con,$member_SL);
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
						<h3>  จัดการ สมาชิก  </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<form class="form-inline" method="get">
							<div class="form-group">
								<a href="member_add.php" class="btn btn-success">
									<span class="glyphicon glyphicon-plus-sign"></span>
									เพิ่ม สมาชิก  
								</a>
							</div>
							<div class="form-group">
								<input type="text" required="กรุณากรอกข้อมูล" class="form-control" placeholder="คำค้นหา" name="TextSearch">
							</div>
							<input type="submit" name="SubmitSearch" value="ค้นหา" class="btn btn-primary">
							<a class="btn btn-default" href="member.php"> ดูทั้งหมด </a>
						</form>	
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?
								
								if (isset($_GET[TextSearch])&&$_GET[TextSearch]!='') {
									?>
									ค้นหา : <span class="text-primary"><? echo $TextSearch; ?></span>	<small><? if ($Num_Rows=='0') { echo "ไม่พบข้อมูล"; } ?></small>
									<?
								}
								if ($Q==1) {
									echo "สมาชิกทั้งหมด";
								}
								?>	
								<span class="badge"> <? echo "$Num_Rows"; ?></span> 
							</div>
							<div class="panel-body">
								
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>ชื่อ - นามสกุล</th>
												<th>อีเมล</th>
												<th>เบอร์</th>
												<th>เป็นสมาชิกเมื่อ</th>
												<th>ข้อมูลส่วนตัว</th>
											</tr>
										</thead>
										<tbody>
											<?
											while ($member 	= mysqli_fetch_array($member_QR)) {
												?>
												<tr>
													<td><? echo $i; ?></td>
													<td>
														<? echo $member[member_name]; ?>
													</td>
													<td>
														<? 
														if (isset($member[member_email])&& trim($member[member_email])!='') {
															echo $member[member_email]; 
														}
														else{
															echo "-";
														}
														?>
													</td>
													<td>
														<? echo $member[member_phone]; ?>
													</td>
													<td>
														<? echo $member[member_now]; ?>
													</td>
													<td>
														<a href="member_one.php?member_id=<?php echo $member[member_id]; ?>" class="btn btn-primary">
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


