<!-- <script>  window.location='Product.php'; </script> -->
<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'Connect.php';

if (isset($_GET[ProductID])){
	$_SESSION[ProductID] =  $_GET[ProductID];
}
$ProductID =   $_SESSION[ProductID];


if ($_POST['Connect_Add']) {
	
	$ConnectName = $_POST['ConnectName'];
	$ConnectProductID = $_POST['ConnectProductID'];

	$Connect_Add = "INSERT INTO `Connect` (`ConnectName`,`ProductID`,`ConnectProductID`) 
	VALUES ('$ConnectName','$ProductID','$ConnectProductID')";

	$Connect_Reult = mysql_query($Connect_Add);



	if (!$Connect_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}

	if ($Connect_Reult) {
		echo"<script>  window.location='Product_One.php'; </script>";
	}

}


$Q = 1;
$Row = "SELECT * FROM Product WHERE ";

if (isset($_GET[CatalogID])&&$_GET[CatalogID]!='') {
	$CatalogID   = $_GET[CatalogID];
	if ($Q==1) {
		$Row .= " CatalogID = '$CatalogID' ";
		$Q++;
	}
}

if (isset($_GET[TextSearch])&&$_GET[TextSearch]!='') {
	$TextSearch = $_GET['TextSearch'];
	$TextSearch= str_replace("'","&#39;",$TextSearch);
	$TextSearch= str_replace("\"","&quot;",$TextSearch);

	if ($Q==1) {
		$Row .= " ( ProductName LIKE '%$TextSearch%'    OR ProductDetail LIKE '%$TextSearch%'    OR ProductReview LIKE '%$TextSearch%'  )";
		$Q++;
	}
	else{
		$Row .= " AND  ( ProductName LIKE '%$TextSearch%'    OR ProductDetail LIKE '%$TextSearch%'    OR ProductReview LIKE '%$TextSearch%'  ) ";
		$Q++;
	}
}

if ($Q==1) {
	$Row = "SELECT * FROM Product ";
}

$RowQuery = mysql_query($Row) or die ("Error Query [".$Row."]");
$Num_Rows = mysql_num_rows($RowQuery);
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

$All_SL = $Row . " ORDER BY ProductID DESC LIMIT $Page_Start , $Per_Page ";
$All_QR 	= mysql_query($All_SL);

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
						<h3>  เชื่อมโยงสินค้า <small style="color: red;">เลือกสินค้าที่ท่านต้องการเชื่อม และกรอกข้อมูลในช่องนั้น</small>  </h3>
						<hr>
					</div>
				</div>

				<div class="row">

					<div class="col-md-4 br-margin2">

						<form class="form-inline" method="get">
							<a href="Product_One.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
							<div class="form-group">
								<input type="text" required="กรุณากรอกข้อมูล" class="form-control" placeholder="ค้นหาสินค้า" name="TextSearch">
							</div>
							<input type="submit" name="SubmitSearch" value="ค้นหา" class="btn btn-primary">
						</form>
					</div>

					<div class="col-md-8 text-right">
						<a style="margin-bottom: 4px;" href="Connect.php" class="btn btn-default">
							ทั้งหมด
						</a>
						<?  
						$Catalog_SL = " SELECT * FROM Catalog ORDER BY CatalogID ASC";
						$Catalog_QR 	= mysql_query($Catalog_SL);
						while ($Catalog 	= mysql_fetch_array($Catalog_QR)) {
							?>
							<a href="Connect.php?CatalogID=<?php echo $Catalog[CatalogID]; ?>" class="btn btn-default" style="margin-bottom: 4px;">
								<? echo "$Catalog[CatalogName]"; ?>
							</a>
							<?
						}
						?>
					</div>

					<div class="col-md-12">

						<div class="panel panel-default">
							<div class="panel-heading">

								<?
								if (isset($_GET[CatalogID])&&$_GET[CatalogID]!='') {
									$Catalog_SL = " SELECT * FROM Catalog WHERE CatalogID = '$CatalogID'";
									$Catalog_QR = mysql_query($Catalog_SL);
									$Catalog 	= mysql_fetch_array($Catalog_QR);
									?>
									ประเภทสินค้า : <span class="text-primary"><? echo $Catalog[CatalogName];  ?></span><small><? if ($Num_Rows=='0') { echo " ไม่พบข้อมูล"; } ?></small>
									<?
								}
								if (isset($_GET[TextSearch])&&$_GET[TextSearch]!='') {
									?>
									ค้นหา : <span class="text-primary"><? echo $TextSearch; ?></span>	<small><? if ($Num_Rows=='0') { echo "ไม่พบข้อมูล"; } ?></small>
									<?
								}
								if ($Q==1) {
									echo "สินค้าทั้งหมด";
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
												<th>รูปสินค้า</th>
												<th>ชื่อสินค้า</th>
												<th>ราคา</th>
												<th>หมวดสินค้า</th>
												<th>เชื่อมโยง</th>
											</tr>
										</thead>
										<tbody>
											<?
											while ($All 	= mysql_fetch_array($All_QR)) {

												$Product_SL = " SELECT * FROM Product WHERE ProductID = '$All[ProductID]'";
												$Product_QR = mysql_query($Product_SL);
												$Product 	= mysql_fetch_array($Product_QR);

												?>
												<tr>
													<td>
														<p><?php echo $i; ?></p>
													</td>
													<td >
														<img style="max-width: 100px;" src="../ProductPhoto/<?php echo $Product[ProductPhoto]; ?>" class="boxsha"  />
													</td>
													<td>
														<p><?php echo $Product[ProductName]; ?></p>
													</td>
													<td>
														<p class="Lora">
															<?
															echo number_format($Product[ProductPrice]);
															?>
														</p>
													</td>
													<td>
														<?
														$Catalog_SL = " SELECT * FROM Catalog WHERE CatalogID = '$Product[CatalogID]'";
														$Catalog_QR = mysql_query($Catalog_SL);
														$Catalog 	= mysql_fetch_array($Catalog_QR);
														if (!isset($Catalog[CatalogID])||$Catalog[CatalogID]=='') {
															?>
															ยังไม่เลือกหมวดสินค้า
															<?
														}
														else{
															echo $Catalog[CatalogName]; 
														}
														?>
													</td>
													<td>
														<form class="form-inline" method="post">
															<div class="form-group">
																<input type="text" required class="form-control" placeholder="ข้อความ,สี" name="ConnectName">
															</div>
															<input type="hidden"  name="ConnectProductID" value="<?php echo $Product[ProductID]; ?>">
															<input type="submit" name="Connect_Add" value="เชื่อมโยงสินค้า" class="btn btn-success">
														</form>
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


