
<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'catalog.php';

$Q = 1;
$Row = "SELECT * FROM catalog WHERE ";

if (isset($_GET[keyword])&&$_GET[keyword]!='') {
	$keyword = $_GET['keyword'];
	$keyword= str_replace("'","&#39;",$keyword);
	$keyword= str_replace("\"","&quot;",$keyword);
	if ($Q==1) {
		$Row .= " ( catalog_name LIKE '%$keyword%'  OR  catalog_detail LIKE '%$keyword%'  )";
		$Q++;
	}
	else{
		$Row .= " AND  ( catalog_name LIKE '%$keyword%'  OR  catalog_detail LIKE '%$keyword%' ) ";
		$Q++;
	}
}
if ($Q==1) {
	$Row = "SELECT * FROM catalog ";
}
else{
	$Row .= " ";
	$Q++;
}
$RowQuery = mysqli_query($con,$Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysqli_num_rows($RowQuery);
$Per_page = 100;   // Per page
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

$catalog_SL = $Row." ORDER BY catalog_sort ASC LIMIT $page_Start , $Per_page ";
$catalog_QR = mysqli_query($con,$catalog_SL);

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
						<h3>  จัดการ หมวดหมู่ </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12">
						<form class="form-inline" method="get">
							<div class="form-group" style="margin-bottom: 15px;">
								<a href="catalog_add.php" class="btn btn-success">
									<span class="glyphicon glyphicon-plus-sign"></span>
									เพิ่ม หมวดหมู่   
								</a>
								<a class="btn btn-default" href="catalog.php">
									หมวดหมู่ ทั้งหมด
								</a>
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<input type="text"  class="form-control" placeholder="คำค้นหา" name="keyword">
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-search">
										ค้นหา
									</span>
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
											หมวดหมู่    ทั้งหมด
											<?
										}
										?>
										<?
										if ($Num_Rows=='0') { echo "(ไม่พบ)"; }
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

											<a class="btn btn-default" href="product.php">
												สินค้าทั้งหมด
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
												<th>#</th>
												<th> รูป  </th>
												<th> หมวดหมู่ </th>
												<th> รายละเอียด , แก้ไข , ลบ </th>
											</tr>
										</thead>
										<tbody class="row_position">
											<?
											while ($catalog 	= mysqli_fetch_array($catalog_QR)) {
												?>
												<tr id="<?php echo $catalog['catalog_id'] ?>">
													<td><? echo $i; ?></td>
													<td style="width: 140px;">
														<a href="catalog_one.php?catalog_id=<?php echo $catalog[catalog_id]; ?>" >
															<img class="full"  src="../cloud/catalog_min/<?php echo $catalog[catalog_photo]; ?>"  />
														</a>
													</td>
													<td>
														<? echo $catalog[catalog_name]; ?>
														<?
														if (isset($catalog[catalog_eng_name])&&trim($catalog[catalog_eng_name])!='') {
															echo "<br>".$catalog[catalog_eng_name]; 
														}
														?>
													</td>
													<td>
														<a href="catalog_one.php?catalog_id=<?php echo $catalog[catalog_id]; ?>" class="btn btn-primary">
															<span class="glyphicon glyphicon-zoom-in"></span>
															รายละเอียด  
														</a>
														<a href="catalog_update.php?catalog_id=<?php echo $catalog[catalog_id]; ?>" class="btn btn-info">
															<span class="glyphicon glyphicon-edit"></span>
															แก้ไข
														</a>
														<a href="catalog_del.php?catalog_id=<?php echo $catalog[catalog_id]; ?>" onclick="return confirm('  ยืนยันการลบข้อมูล  ? ')"  class="btn btn-danger">
															<span class="glyphicon glyphicon-trash"></span> ลบ
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
	<?

	$position = $_POST['position'];

	$catalog_sort_i=1;
	foreach($position as $k=>$v){
		$sql = "Update catalog SET catalog_sort=".$catalog_sort_i." WHERE catalog_id =".$v;
		$mysqli->query($sql);

		$catalog_sort_i++;
	}

	?>
	<script type="text/javascript">
		$( ".row_position" ).sortable({
			delay: 150,
			stop: function() {
				var selectedData = new Array();
				$('.row_position>tr').each(function() {
					selectedData.push($(this).attr("id"));
				});
				updateOrder(selectedData);
			}
		});
		function updateOrder(data) {
			$.ajax({
				url:"catalog.php",
				type:'post',
				data:{position:data},
				success:function(){

				}
			})
		}
	</script>
</body>
</html>
