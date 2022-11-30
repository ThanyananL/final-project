
<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'product.php';

$Q = 1;
$sql_saerch = "SELECT * FROM product WHERE  ( product_status_id != '3') AND ";


if (isset($_GET[catalog_id])&&trim($_GET[catalog_id])!='') {
	$catalog_id = $_GET['catalog_id'];
	if ($Q==1) {
		$sql_saerch .= " ( catalog_id = '$catalog_id')";
		$Q++;
	}
	else{
		$sql_saerch .= " AND   ( catalog_id = '$catalog_id')";
		$Q++;
	}
}
if (isset($_GET[collection_id])&&trim($_GET[collection_id])!='') {
	$collection_id = $_GET['collection_id'];
	if ($Q==1) {
		$sql_saerch .= " ( collection_id = '$collection_id')";
		$Q++;
	}
	else{
		$sql_saerch .= " AND   ( collection_id = '$collection_id')";
		$Q++;
	}
}

if (isset($_GET[product_status_id])&&trim($_GET[product_status_id])!='') {
	$product_status_id = $_GET['product_status_id'];
	if ($Q==1) {
		$sql_saerch .= " ( product_status_id = '$product_status_id')";
		$Q++;
	}
	else{
		$sql_saerch .= " AND   ( product_status_id = '$product_status_id')";
		$Q++;
	}
}

if (isset($_GET[recommend_name])&&$_GET[recommend_name]!='') {
	$recommend_name = $_GET['recommend_name'];
	$recommend_name .= " ,";
	$recommend_name2 = ", ".$_GET['recommend_name'];
	$recommend_name3 = " ".$_GET['recommend_name'];

	if ($Q==1) {
		$sql_saerch .= " ( recommend_name LIKE '%$recommend_name%' OR recommend_name LIKE '%$recommend_name2%' OR recommend_name = '$recommend_name3')";
		$Q++;
	}
	else{
		$sql_saerch .= " AND   ( recommend_name LIKE '%$recommend_name%' OR recommend_name LIKE '%$recommend_name2%' OR recommend_name = '$recommend_name3')";
		$Q++;
	}
}

if (isset($_GET[keyword])&&$_GET[keyword]!='') {
	$keyword = $_GET['keyword'];
	$keyword= str_replace("'","&#39;",$keyword);
	$keyword= str_replace("\"","&quot;",$keyword);
	if ($Q==1) {
		$sql_saerch .= " (  product_name LIKE '%$keyword%' or product_detail LIKE '%$keyword%' or product_review LIKE '%$keyword%' )";
		$Q++;
	}
	else{
		$sql_saerch .= " AND  (  product_name LIKE '%$keyword%' or product_detail LIKE '%$keyword%' or product_review LIKE '%$keyword%' ) ";
		$Q++;
	}
}

if ($Q==1) {
	$sql_saerch = "SELECT * FROM product WHERE ( product_status_id != '3')  ";
}
else{
	$sql_saerch .= " ";
	$Q++;
}


$sql_saerchQuery = mysqli_query($con,$sql_saerch) or die ("Error Query [".$sql_saerch."]");
$Num_Rows = mysqli_num_rows($sql_saerchQuery);
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

$product_SL = $sql_saerch." ORDER BY product_datetime desc LIMIT $page_Start , $Per_page ";
$product_QR = mysqli_query($con,$product_SL);

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
						<h3>  จัดการ สินค้า   </h3>
						<hr>
					</div>
				</div>
				<? include 'index_Alerts.php'; ?>
				<div class="row">
					<div class="col-md-12">
						<form class="form-inline" method="get">
							<div class="form-group" style="margin-bottom: 15px;">
								<a href="product_add.php" class="btn btn-success">
									<span class="glyphicon glyphicon-plus-sign"></span>
									เพิ่มสินค้า
								</a>
								<a class="btn btn-default" href="product.php">
									สินค้าทั้งหมด
								</a>
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<input type="text"  class="form-control" placeholder="ค้นหาสินค้า" name="keyword">
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<select class="form-control"  name="catalog_id" onChange ="Listcollection(this.value)">
									<option value="0">หมวดหมู่</option>
									<?
									$catalog_SL = " SELECT * FROM catalog  ORDER BY catalog_id ASC";
									$catalog_QR 	= mysqli_query($con,$catalog_SL);
									while ($catalog 	= mysqli_fetch_array($catalog_QR)) {
										?>
										<option value="<?php echo $catalog[catalog_id]; ?>"><?php echo $catalog[catalog_name]; ?>  </option>
										<?
									}
									?>
								</select>
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<select placeholder="หมวดหมู่ย่อย"  class="form-control"  id="ddlcollection" name="collection_id" >
									<option value="0">หมวดหมู่ย่อย</option>
									<option value="0">กรุณาเลือกหมวดหมู่หลัก</option>
								</select>
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<select class="form-control"  name="product_status_id" >
									<option value=""> สถานะ </option>
									<?
									$product_status_SL = " SELECT * FROM product_status where product_status_id != '3'  ORDER BY product_status_id ASC";
									$product_status_QR 	= mysqli_query($con,$product_status_SL);
									while ($product_status 	= mysqli_fetch_array($product_status_QR)) {
										?>
										<option value="<?php echo $product_status[product_status_id]; ?>"><?php echo $product_status[product_status_name]; ?>  </option>
										<?
									}
									?>
								</select>
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<select class="form-control"  name="recommend_name" >
									<option value="">รายการแสดง</option>
									<?
									$recommend_SL = " SELECT * FROM recommend  ORDER BY recommend_id ASC";
									$recommend_QR 	= mysqli_query($con,$recommend_SL);
									while ($recommend 	= mysqli_fetch_array($recommend_QR)) {
										?>
										<option value="<?php echo $recommend[recommend_name]; ?>"><?php echo $recommend[recommend_name]; ?>  </option>
										<?
									}
									?>
								</select>
							</div>
							<div class="form-group" style="margin-bottom: 15px;">
								<button type="submit" class="btn btn-primary">
										ค้นหา
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
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
										if (isset($_GET[catalog_id])&&$_GET[catalog_id]!='') {
											$catalog_head_SL = " SELECT * FROM catalog WHERE catalog_id = '$_GET[catalog_id]'";
											$catalog_head_QR = mysqli_query($con,$catalog_head_SL);
											$catalog_head 	= mysqli_fetch_array($catalog_head_QR);
											?>
											<? echo $catalog_head[catalog_name]; echo " "; ?>
											<?
										}
										if (isset($_GET[collection_id])&&$_GET[collection_id]!='') {
											$collection_head_SL = " SELECT * FROM collection WHERE collection_id = '$_GET[collection_id]'";
											$collection_head_QR = mysqli_query($con,$collection_head_SL);
											$collection_head 	= mysqli_fetch_array($collection_head_QR);
											?>
											<? echo $collection_head[collection_name]; echo " "; ?>
											<?
										}
										if (isset($_GET[product_status_id])&&$_GET[product_status_id]!='') {
											$product_status_head_SL = " SELECT * FROM product_status WHERE product_status_id = '$_GET[product_status_id]'";
											$product_status_head_QR = mysqli_query($con,$product_status_head_SL);
											$product_status_head 	= mysqli_fetch_array($product_status_head_QR);
											?>
											<? echo $product_status_head[product_status_name]; echo " "; ?>
											<?
										}
										if (isset($_GET[recommend_name])&&$_GET[recommend_name]!='') {
											?>
											<? echo $recommend_name; echo " "; ?>
											<?
										}
										if ($Q==1) {
											?>
											สินค้าทั้งหมด
											<?
										}
										?>
										<?
										if ($Num_Rows=='0') { echo " (ไม่พบข้อมูล)"; }
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
												<th> สินค้า </th>
												<th> ราคา </th>
												<th> หมวดหมู่  </th>
												<th> รายการ </th>
												<th> สถานะ  </th>
												<th> รายละเอียด , แก้ไข , ลบ </th>
											</tr>
										</thead>
										<tbody class="row_position">
											<?
											while ($product 	= mysqli_fetch_array($product_QR)) {

												?>
												<tr id="<?php echo $product['product_id'] ?>">
													<td><? echo $i; ?></td>
													<td style="width: 50px;">
														<a href="product_one.php?product_id=<?php echo $product[product_id]; ?>" >
															<div class="img100">
																<img  src="../cloud/product_min/<?php echo $product[product_photo]; ?>" />
															</div>
														</a>
													</td>
													<td style="max-width: 250px;">
														<? echo $product[product_name]; ?>
													</td>
													<td>
														<?
														if (isset($product[product_price])&&trim($product[product_price])!='') {
															echo number_format($product[product_price]); 
														}
														else{
															echo "-";
														}
														?>
													</td>
													<td>
														<? 
														if (isset($product[catalog_id])&&trim($product[catalog_id])!='') {
															
															$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$product[catalog_id]'";
															$catalog_QR = mysqli_query($con,$catalog_SL);
															$catalog 	= mysqli_fetch_array($catalog_QR);

															echo $catalog[catalog_name];
														}
														else{
															echo " - ";
														}
														?>
													</td>
													<td>
														<? 
														if (isset($product[recommend_name])&&trim($product[recommend_name])!='') {
															echo $product[recommend_name]; 
														}
														else{
															echo "-";
														}
														?>
													</td>
													<td>
														<? 
														if (isset($product[product_status_id])&&trim($product[product_status_id])!='') {
															
															$product_status_SL = " SELECT * FROM product_status WHERE product_status_id = '$product[product_status_id]'";
															$product_status_QR = mysqli_query($con,$product_status_SL);
															$product_status 	= mysqli_fetch_array($product_status_QR);

															echo $product_status[product_status_name];
														}
														else{
															echo " - ";
														}
														?>
													</td>
													<td>
														<a href="product_one.php?product_id=<?php echo $product[product_id]; ?>" class="btn btn-primary">
															<span class="glyphicon glyphicon-zoom-in"></span>
															รายละเอียด  
														</a>
														<a href="product_update.php?product_id=<?php echo $product[product_id]; ?>" class="btn btn-info">
															<span class="glyphicon glyphicon-edit"></span>
															แก้ไข
														</a>
														<a href="product_del.php?product_id=<?php echo $product[product_id]; ?>" onclick="return confirm('  ยืนยันการลบข้อมูล  ? ')"  class="btn btn-danger">
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
	<?
	$position = $_POST['position'];
	$product_sort_i=1;
	foreach($position as $k=>$v){
		$sql = "Update product SET product_sort=".$product_sort_i." WHERE product_id =".$v;
		$mysqli->query($sql);

		$product_sort_i++;
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
				url:"product.php",
				type:'post',
				data:{position:data},
				success:function(){

				}
			})
		}
	</script>
</body>
</html>
