<?

include 'index_Include.php'; 
$_SESSION['page'] = 'product.php';
$Q = 1;
$sql_saerch = "SELECT * FROM product WHERE  ( product_status_id != '3') AND ( product_status_id != '2') AND ";

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
	$sql_saerch = "SELECT * FROM product WHERE ( product_status_id != '3') AND  ( product_status_id != '2') ";
}
else{
	$sql_saerch .= " ";
	$Q++;
}

$sql_saerchQuery = mysqli_query($con,$sql_saerch) or die ("Error Query [".$sql_saerch."]");
$Num_Rows = mysqli_num_rows($sql_saerchQuery);
$Per_page = 24;   // Per page
$page = $_GET["page"];
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



if ($_GET['sorting']=='descending') {
	$product_SL = $sql_saerch . " ORDER BY product_price desc LIMIT $page_Start , $Per_page ";
}
else if($_GET['sorting']=='ascending'){
	$product_SL = $sql_saerch . " ORDER BY product_price asc LIMIT $page_Start , $Per_page ";
}
else{
	$product_SL = $sql_saerch . " ORDER BY product_id desc LIMIT $page_Start , $Per_page ";
}
$product_QR 	= mysqli_query($con,$product_SL);





?>

<!DOCTYPE html>
<html>
<head>
	<?
	if (isset($_GET[catalog_id])&&trim($_GET[catalog_id])!='') {
		$catalog_head_SL = " SELECT * FROM catalog WHERE catalog_id = '$_GET[catalog_id]'";
		$catalog_head_QR = mysqli_query($con,$catalog_head_SL);
		$catalog_head 	= mysqli_fetch_array($catalog_head_QR);
		?>  
		<title> <? echo $catalog_head[catalog_name];  ?> | <? echo $fixed[fixed_website]; ?> </title>
		<meta name="description" content="<? echo $fixed[fixed_company]; ?> <? echo $fixed[fixed_topic]; ?>">
		<meta name="keywords" content="<? echo $catalog_head[catalog_name]; ?> ">
		<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
		<?
	}
	if (isset($_GET[collection_id])&&trim($_GET[collection_id])!='') {
		$collection_head_SL = " SELECT * FROM collection WHERE collection_id = '$_GET[collection_id]'";
		$collection_head_QR = mysqli_query($con,$collection_head_SL);
		$collection_head 	= mysqli_fetch_array($collection_head_QR);
		?>  
		<title> <? echo $collection_head[collection_name];  ?> | <? echo $fixed[fixed_website]; ?> </title>
		<meta name="description" content="<? echo $fixed[fixed_company]; ?> <? echo $fixed[fixed_topic]; ?>">
		<meta name="keywords" content="<? echo $collection_head[collection_name]; ?> ">
		<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
		<?
	}
	if (isset($_GET[recommend_name])&&trim($_GET[recommend_name])!='') {
		$recommend_head_SL = " SELECT * FROM recommend WHERE recommend_name = '$_GET[recommend_name]'";
		$recommend_head_QR = mysqli_query($con,$recommend_head_SL);
		$recommend_head 	= mysqli_fetch_array($recommend_head_QR);
		?>  
		<title> <? echo $recommend_head[recommend_name];  ?> | <? echo $fixed[fixed_website]; ?> </title>
		<meta name="description" content="<? echo $fixed[fixed_company]; ?> <? echo $fixed[fixed_topic]; ?>">
		<meta name="keywords" content="<? echo $recommend_head[recommend_name]; ?><? echo $recommend_head[recommend_detail]; ?> ">
		<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
		<?
	}
	if (isset($_GET[keyword])&&$_GET[keyword]!='') {
		?>  
		<title> ค้นหา : <? echo $keyword; ?> | <? echo $fixed[fixed_website]; ?> </title>
		<meta name="description" content="<? echo $fixed[fixed_company]; ?> <? echo $fixed[fixed_topic]; ?>">
		<meta name="keywords" content="<? echo $fixed[fixed_company]; ?> <? echo $fixed[fixed_topic]; ?> ">
		<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
		<?
	}
	if ($Q==1) {
		?>
		<title> <? if($_SESSION[Language]== "Thailand"){echo "สินค้าทั้งหมด"; } else{echo "All product"; } ?> | <? echo $fixed[fixed_website]; ?> </title>
		<meta name="description" content="<? echo $fixed[fixed_company]; ?> <? echo $fixed[fixed_topic]; ?>">
		<meta name="keywords" content="<? echo $fixed[fixed_company]; ?> <? echo $fixed[fixed_topic]; ?> ">
		<meta name="author" content="<? echo $fixed[fixed_topic]; ?>">
		<?
	}
	?>	
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navber.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 between15">
				<ul class="breadcrumb" style="margin-bottom: 0px;padding: 0px;">
					<li>
						<a onclick="goBack();" href="#">
							<? if($_SESSION[Language]== "Thailand"){echo "กลับ"; } else{echo "Back"; } ?> 
						</a>
					</li>
					<li><a href="index.php"> <? if($_SESSION[Language]== "Thailand"){echo "หน้าแรก"; } else{echo "Home"; } ?> </a></li>
					<li class="active"> 
						<?
						if (isset($_GET[keyword])&&$_GET[keyword]!='') {
							?>
							ค้นหา : <? echo $keyword; echo " "; ?>
							<?
						}
						if (isset($_GET[catalog_id])&&$_GET[catalog_id]!='') {
							?>
							<?
							if($_SESSION[Language]== "Thailand"){
								echo $catalog_head[catalog_name]; 
							} 
							else if($catalog_head[catalog_name_eng]!=''){
								echo $catalog_head[catalog_name_eng];  
							}
							else{
								echo $catalog_head[catalog_name];
							}
							?>
							<? echo " "; ?>
							<?
						}
						if (isset($_GET[collection_id])&&$_GET[collection_id]!='') {
							?>
							<?
							if($_SESSION[Language]== "Thailand"){
								echo $collection_head[collection_name]; 
							} 
							else if($collection_head[collection_name_eng]!=''){
								echo $collection_head[collection_name_eng];  
							}
							else{
								echo $collection_head[collection_name];
							}
							?>
							<? echo " "; ?>
							<?
						}
						if (isset($_GET[recommend_name])&&$_GET[recommend_name]!='') {
							?>
							<?
							if($_SESSION[Language]== "Thailand"){
								echo $recommend_head[recommend_name]; 
							} 
							else if($recommend_head[recommend_name_eng]!=''){
								echo $recommend_head[recommend_name_eng];  
							}
							else{
								echo $recommend_head[recommend_name];
							}
							?>
							<? echo " "; ?>
							<?
						}
						if ($Q==1) {
							?>
							<? if($_SESSION[Language]== "Thailand"){echo "สินค้าทั้งหมด"; } else{echo "All product"; } ?>
							<?
						}
						?>

					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default resize no-border no-radius radius20" style="overflow: hidden;">
							<div class="panel-heading bold" style="background-color: #e5e5e5;border:0px;font-size: 16px;">
								<? if($_SESSION[Language]== "Thailand"){echo "หมวดหมู่"; } else{echo "categories"; } ?>
							</div>
							<div class="panel-body" style="background-color: #f4f4f4;">
								<?
								$catalog_SL = "SELECT * FROM catalog ORDER BY catalog_sort asc";
								$catalog_QR 	= mysqli_query($con,$catalog_SL);
								$catalog_Row 	= mysqli_num_rows($catalog_QR);
								if ($catalog_Row>0) {
									?>
									<div class="row">
										<?
										while ($catalog     = mysqli_fetch_array($catalog_QR)) {
											?>
											<div class="col-md-12 col-xs-6">
												<p class="size15 text-black hide1" style="line-height: 17px !important;"> 
													<a  href="product.php?catalog_id=<? echo  $catalog[catalog_id];?>">
														<?
														if($_SESSION[Language]== "Thailand"){
															echo $catalog[catalog_name]; 
														} 
														else if($catalog[catalog_name_eng]!=''){
															echo $catalog[catalog_name_eng];  
														}
														else{
															echo $catalog[catalog_name];
														}
														?>
													</a>
												</p>
											</div>
											<?
										}
										?>
										<?
										$recommend_SL = " SELECT * FROM recommend  ORDER BY recommend_id ASC";
										$recommend_QR 	= mysqli_query($con,$recommend_SL);
										while ($recommend 	= mysqli_fetch_array($recommend_QR)) {
											?>
											<div class="col-md-12 col-xs-6">
												<p class="size15 text-black hide1" style="line-height: 17px !important;"> 
													<a  href="product.php?recommend_name=<? echo  $recommend[recommend_name];?>">
														<?
														if($_SESSION[Language]== "Thailand"){
															echo $recommend[recommend_name]; 
														} 
														else if($recommend[recommend_name_eng]!=''){
															echo $recommend[recommend_name_eng];  
														}
														else{
															echo $recommend[recommend_name];
														}
														?>
													</a>
												</p>
											</div>
											<?
										}
										?>
										<div class="col-md-12 col-xs-6">
											<p class="size15 text-black hide1" style="line-height: 17px !important;"> 
												<a  href="product.php">
													<? if($_SESSION[Language]== "Thailand"){echo "สินค้าทั้งหมด"; } else{echo "All product"; } ?>
												</a>
											</p>
										</div>
									</div>
									<?
								}
								?>
							</div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default resize no-border radius20" style="overflow: hidden;"> 
							<div class="panel-heading bold" style="background-color: #e5e5e5;border:0px;font-size: 16px;">
								ติดต่อสอบถาม
							</div>
							<div class="panel-body" style="background-color: #f4f4f4;">
								<?
								$social_SL = " SELECT * FROM social ORDER BY social_sort ASC ";
								$social_QR 	= mysqli_query($con,$social_SL);
								while ($social 	= mysqli_fetch_array($social_QR)) {
									?>
									<p class="hide1 text-black" title="<?php echo $social[social_name]; ?>">
										<?
										if (isset($social[social_link])&&$social[social_link]!='') {

											if ($social[social_type]=='Tel') {
												?>
												<a  href="tel:<?php echo $social[social_link]; ?>" target="_blank"> 
													<?
													if (isset($social[social_photo])&&$social[social_photo]!='') {
														?>
														<img style="max-height:25px;" src="cloud/social_photo/<?php echo $social[social_photo]; ?>" /> 
														<?
													}
													else{
														echo $social[social_type]."  :  ";
													}
													?>
													<?php echo $social[social_name]; ?>
												</a>
												<?
											}
											else{
												?>
												<a  href="http://<?php echo $social[social_link]; ?>" target="_blank"> 
													<?
													if (isset($social[social_photo])&&$social[social_photo]!='') {
														?>
														<img style="max-height:25px;" src="cloud/social_photo/<?php echo $social[social_photo]; ?>" /> 
														<?
													}
													else{
														echo $social[social_type]."  :  ";
													}
													?>
													<?php echo $social[social_name]; ?>
												</a>
												<?
											}
										}
										else{
											?>
											<a> 
												<?
												if (isset($social[social_photo])&&$social[social_photo]!='') {
													?>
													<img style="max-height:25px;" src="cloud/social_photo/<?php echo $social[social_photo]; ?>" /> 
													<?
												}
												else{
													echo $social[social_type]."  :  ";
												}
												?>
												<?php echo $social[social_name]; ?>  
											</a>
											<?
										}
										?>
									</p>
									<?
								}
								?>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default resize no-border no-radius no-boxsha">
							<div class="panel-heading bold no-radius no-boxsha" style="background-color: #e5e5e5;border:0px;font-size: 16px;padding: 5px;">
								<div class="row">
									<div class="col-md-4">
										<form class="form-inline" action="product.php">
											<div class="form-group">
												<select onchange='if(this.value != 0) { this.form.submit(); }' class="form-control no-boxsha sorting"  name="sorting" style="padding: 3px 12px 3px 7px !important;height: 30px;border-radius: 0px !important;font-size: 13px !important;" >
													<option value="">เรียงลำดับ</option>
													<option value="ascending">เรียงราคาจากน้อยไปมาก</option>
													<option value="descending">เรียงราคาจากมากไปน้อย</option>
												</select>
											</div>
										</form>
									</div>
									<div class="col-md-4">
										<span style="font-size: 14px;">ดูในมุมมอง</span>
										<a class="btn btn-default btn-sm" href="product.php?mode=grid"><span class="glyphicon glyphicon-th"></span></a>
										<a class="btn btn-default btn-sm" href="product.php?mode=list"><span class="glyphicon glyphicon-th-list"></span></a>
									</div>
									<div class="col-md-4 text-right " id="product_page" style="margin-bottom: -5px;padding-bottom: 0px;">
										<? include 'index_Pagenum.php'; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?
				if (isset($_GET[catalog_id])&&$_GET[catalog_id]!='') {
					$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$_GET[catalog_id]'";
					$catalog_QR = mysqli_query($con,$catalog_SL);
					$catalog 	= mysqli_fetch_array($catalog_QR);
					if (isset($catalog[catalog_detail])&&trim($catalog[catalog_detail])!='') {
						?>
						<div class="row ">
							<div class="col-md-12 margintop15">
								<div class="panel panel-default no-boxsha">
									<div class="panel-body bg-1 radius20">
										<?
										if($_SESSION[Language]== "Thailand"){
											echo $catalog[catalog_detail]; 
										} 
										else if($catalog[catalog_detail_eng]!=''){
											echo $catalog[catalog_detail_eng];  
										}
										else{
											echo $catalog[catalog_detail];
										}
										?>	
									</div>
								</div>
							</div>
						</div>
						<?
					}
				}
				?>

				<?
				if ($_GET['mode']=='grid') {
					?>
					<div>
						<?
						$MD=1;
						while ($product     = mysqli_fetch_array($product_QR)) {
							if ($MD==1) {
								?>
								<div class="row">
									<?php
								}
								?>  
								<div class="col-md-3 col-xs-6">
									<? include 'index_panel_product.php'; ?>
								</div>
								<?php
								if ($MD==4) {
									$MD=0;
									?>
								</div>
								<?
							}
							$MD++;
						}
						if ($MD!=1) {
							echo "</div>";
						}
						?>
					</div>
					<?
				}
				else if($_GET['mode']=='list'){
					?>
					<div>
						<?
						$MD=1;
						while ($product     = mysqli_fetch_array($product_QR)) {
							if ($MD==1) {
								?>
								<div class="row">
									<?php
								}
								?>  
								<div class="col-md-12">
									<? include 'index_panel_product_list.php'; ?>
								</div>
								<?php
								if ($MD==1) {
									$MD=0;
									?>
								</div>
								<?
							}
							$MD++;
						}
						if ($MD!=1) {
							echo "</div>";
						}
						?>
					</div>
					<?
				}
				else{
					?>
					<div>
						<?
						$MD=1;
						while ($product     = mysqli_fetch_array($product_QR)) {
							if ($MD==1) {
								?>
								<div class="row">
									<?php
								}
								?>  
								<div class="col-md-3 col-xs-6">
									<? include 'index_panel_product.php'; ?>
								</div>
								<?php
								if ($MD==4) {
									$MD=0;
									?>
								</div>
								<?
							}
							$MD++;
						}
						if ($MD!=1) {
							echo "</div>";
						}
						?>
					</div>
					<?
				}
				?>


				<?
				if ($Num_Rows==0) {
					?>
					<h2>
						ไม่พบสินค้า 
					</h2>
					<?
				}
				?>

				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default resize no-border no-radius no-boxsha">
							<div class="panel-heading bold no-radius no-boxsha" style="background-color: #e5e5e5;border:0px;font-size: 16px;padding: 5px;">
								<div class="row">
									<div class="col-md-4">
										<form class="form-inline" action="product.php">
											<div class="form-group">
												<select onchange='if(this.value != 0) { this.form.submit(); }' class="form-control no-boxsha sorting"  name="sorting" style="padding: 3px 12px 3px 7px !important;height: 30px;border-radius: 0px !important;font-size: 13px !important;" >
													<option value="">เรียงลำดับ</option>
													<option value="ascending">เรียงราคาจากน้อยไปมาก</option>
													<option value="descending">เรียงราคาจากมากไปน้อย</option>
												</select>
											</div>
										</form>
									</div>
									<div class="col-md-4">
										<span style="font-size: 14px;">ดูในมุมมอง</span>
										<a class="btn btn-default btn-sm" href="product.php?mode=grid"><span class="glyphicon glyphicon-th"></span></a>
										<a class="btn btn-default btn-sm" href="product.php?mode=list"><span class="glyphicon glyphicon-th-list"></span></a>
									</div>
									<div class="col-md-4 text-right " id="product_page" style="margin-bottom: -5px;padding-bottom: 0px;">
										<? include 'index_Pagenum.php'; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<? include 'index_Footer.php'; ?>
</body>
</html>