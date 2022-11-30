<?

include 'index_Include.php'; 
$_SESSION['page'] = 'product.php';

if (isset($_GET[product_id])){
	$_SESSION[product_id] =  $_GET[product_id];
}
$product_id = $_SESSION[product_id];

$product_SL = " SELECT * FROM product WHERE product_id = '$product_id'";
$product_QR = mysqli_query($con,$product_SL);
$product 	= mysqli_fetch_array($product_QR);

$product_name = $product[product_name];

?>
<!DOCTYPE html>
<html>
<head>
	<title>  <?if($_SESSION[Language]== "Thailand"){	echo $product[product_name]; } else if($product[product_name_eng]!=''){	echo $product[product_name_eng];  }else{	echo $product[product_name];}?> | <? echo $fixed[fixed_website]; ?></title>
	<meta name="keywords" content="  <?if($_SESSION[Language]== "Thailand"){	echo $product[product_name]; } else if($product[product_name_eng]!=''){	echo $product[product_name_eng];  }else{	echo $product[product_name];}?>">
	<meta name="description" content="  <?if($_SESSION[Language]== "Thailand"){	echo $product[product_detail]; } else if($product[product_detail_eng]!=''){	echo $product[product_detail_eng];  }else{	echo $product[product_detail];}?> <? echo $fixed[fixed_website]; ?> ">
	<meta name="author" content="  <?if($_SESSION[Language]== "Thailand"){	echo $product[product_name]; } else if($product[product_name_eng]!=''){	echo $product[product_name_eng];  }else{	echo $product[product_name];}?>">
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navber.php'; ?>
	<div class="container betwixt30">
		<div class="row">
			<div class="col-md-12">
				<p class="pagetopic">
					<?if($_SESSION[Language]== "Thailand"){	echo $product[product_name]; } else if($product[product_name_eng]!=''){	echo $product[product_name_eng];  }else{	echo $product[product_name];}?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-1">
						<div class="row hidden-xs hidden-sm">
							<div class="controls">
								<ul class="nav">
									<li data-target="#custom_carousel" data-slide-to="0" class="active">
										<a href="#">
											<div class="img100">
												<img src="cloud/product_photo/<?php echo $product[product_photo]; ?>" class="full" >
											</div>
										</a>
									</li>
									<?
									$product_picture_SL = " SELECT * FROM product_picture WHERE product_id = '$product_id' ORDER BY product_picture_id ASC";
									$product_picture_QR 	= mysqli_query($con,$product_picture_SL);
									$product_picture_Row = mysqli_num_rows($product_picture_QR);
									$product_picture_Number =1;
									while ($product_picture 	= mysqli_fetch_array($product_picture_QR)) {
										?>
										<li data-target="#custom_carousel" data-slide-to="<? echo $product_picture_Number; ?>">
											<a href="#">
												<div class="img100">
													<img src="cloud/product_picture_photo/<?php echo $product_picture[product_picture_photo]; ?>" class="full" >
												</div>
											</a>
										</li>
										<?
										$product_picture_Number++;
									}
									?>

								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-6 product_photo">
						<div id="custom_carousel" class="carousel slide" data-ride="carousel"  data-interval="false">
							<div class="carousel-inner" >
								<div class="item active">
									<div>
										<img class="full" style="cursor: zoom-in;" id="myImgmain<?php echo $product[product_id]; ?>" src="cloud/product_photo/<?php echo $product[product_photo]; ?>"  />
									</div>	
								</div> 
								<div id="myModal" class="w3-modal">
									<span class="zoom-close w3-close">&times;</span>
									<img class="w3-modal-content w3-close" id="img01">
								</div>
								<script>
									var w3modal = document.getElementById("myModal");
									var img = document.getElementById("myImgmain<?php echo $product[product_id]; ?>");
									var modalImg = document.getElementById("img01");
									img.onclick = function(){
										w3modal.style.display = "block";
										modalImg.src = this.src;
									}
									var span = document.getElementsByClassName("w3-close")[0];
									span.onclick = function() { 
										w3modal.style.display = "none";
									}

									window.onclick = function(event) {
										if (event.target == w3modal) {
											w3modal.style.display = "none";
										}
									}
								</script>
								<?
								$product_picture_SL = " SELECT * FROM product_picture WHERE product_id = '$product_id' ORDER BY product_picture_id ASC";
								$product_picture_QR 	= mysqli_query($con,$product_picture_SL);
								$product_picture_Row = mysqli_num_rows($product_picture_QR);
								$i=1;
								while ($product_picture 	= mysqli_fetch_array($product_picture_QR)) {
									$i++;
									?>
									<div class="item">
										<div>
											<img class="full" style="cursor: zoom-in;" id="myImg<?php echo $product_picture[product_picture_id]; ?>" src="cloud/product_picture_photo/<?php echo $product_picture[product_picture_photo]; ?>"  />
										</div>	
									</div> 
									<div id="myModal" class="w3-modal">
										<span class="zoom-close w3-close">&times;</span>
										<img class="w3-modal-content w3-close" id="img01">
									</div>
									<script>
										var w3modal = document.getElementById("myModal");
										var img = document.getElementById("myImg<?php echo $product_picture[product_picture_id]; ?>");
										var modalImg = document.getElementById("img01");
										img.onclick = function(){
											w3modal.style.display = "block";
											modalImg.src = this.src;
										}
										var span = document.getElementsByClassName("w3-close")[0];
										span.onclick = function() { 
											w3modal.style.display = "none";
										}


										window.onclick = function(event) {
											if (event.target == w3modal) {
												w3modal.style.display = "none";
											}
										}
									</script>
									<?php
								}
								?>
							</div>
							<a class="left carousel-control" href="#custom_carousel" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#custom_carousel" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
						<!-- custom_carousel -->


					</div>
					<div class="col-md-5">
						<!-- row -->
						<div class="row">
							<div class="col-md-12">
								<p class="size18 bold">
									<?if($_SESSION[Language]== "Thailand"){	echo $product[product_name]; } else if($product[product_name_eng]!=''){	echo $product[product_name_eng];  }else{	echo $product[product_name];}?>
								</p>
								<?
								if (isset($product[product_detail])&&trim($product[product_detail])!='') {
									?>
									<p class="size16">
										<?if($_SESSION[Language]== "Thailand"){	echo $product[product_detail]; } else if($product[product_detail_eng]!=''){	echo $product[product_detail_eng];  }else{	echo $product[product_detail];}?>
									</p>
									<?
								}
								if (isset($product[catalog_id])&&trim($product[catalog_id])!='0') {

									$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$product[catalog_id]'";
									$catalog_QR = mysqli_query($con,$catalog_SL);
									$catalog 	= mysqli_fetch_array($catalog_QR);

									?>
									<p class="size16 text-muted">
										หมวดหมู่ :  <? echo $catalog[catalog_name]; ?>
									</p>
									<?
								}
								?>
							</div>
							<div class="col-md-12">
								<form  method="get" action="product_cart.php" encType="multipart/form-data">
									<input type="hidden" name="add_cart" value="x">
									<div class="form-group marginbottom5">
										<div class="col-md-12">
											<label class="marginbottom5 control-label " > <span class="size20"> <? echo number_format($product[product_price]); ?> บาท </span></label>
										</div>
										<div class="col-md-6">
											<?
											if (isset($product[product_amount])&&trim($product[product_amount]) == '0') {
												?>
												<input disabled placeholder="สินค้าหมด"  name="product_amount" type="number" class="form-control" maxlength="4" max="<? echo $product[product_amount]; ?>" required>
												<?
											}
											else{
												?>
												<input placeholder="กรอกจำนวนสินค้า" value="1" name="product_amount" type="number" class="form-control" maxlength="4" max="<? echo $product[product_amount]; ?>" required>
												<small>กรอกจำนวนสินค้า</small>
												<? 											
											}
											?>
											<input type="hidden" name="product_id" value="<? echo $product[product_id]; ?>" >
										</div>
										<div class="col-md-6">
											<?
											if (isset($product[product_amount])&&trim($product[product_amount]) == '0') {
												?>
												<button  class=" marginbottom5 btn btn-danger  boxsha btn-block">
													<span class="glyphicon glyphicon-shopping-cart"></span>
													<? if($_SESSION[Language]== "Thailand"){echo "สินค้าหมด"; } else{echo "sold out"; } ?> 
												</button>
												<?
											}
											else{
												?>
												<button type="submit" class=" marginbottom5 btn btn-main  boxsha btn-block">
													<span class="glyphicon glyphicon-shopping-cart"></span>
													<? if($_SESSION[Language]== "Thailand"){echo "เพิ่มในตะกร้าสินค้า"; } else{echo "Add cart"; } ?> 
												</button>
												<?												
											}
											?>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- row -->	
					</div>
				</div>
				<!-- row -->
			</div>
			<!-- 12 -->
		</div>
		<!-- row -->
		<?
		if (trim($product[product_review])) {
			?>
			<div class="row">
				<div class="col-md-12 margintop15">
					<div class="panel panel-default radius20">
						<div class="panel-body bg-1  review">
							<?if($_SESSION[Language]== "Thailand"){	echo $product[product_review]; } else if($product[product_review_eng]!=''){	echo $product[product_review_eng];  }else{	echo $product[product_review];}?>
						</div>
					</div>
				</div>
			</div>
			<?
		}
		?>

		<div class="row margintop30">
			<div class="col-md-12">
				<p class="pagetopic">
					<? if($_SESSION[Language]== "Thailand"){echo "สินค้าที่คุณอาจสนใจ"; } else{echo "Related Products"; } ?>
				</p>
			</div>	
		</div>
		<!-- product -->
		<?
		$product_SL = " SELECT * FROM product  WHERE product_id != '$product_id' AND  ( product_status_id != '3') AND  ( product_status_id != '2') ORDER BY  RAND() LIMIT 4";
		$product_QR 	= mysqli_query($con,$product_SL);
		$Ac_i=1;
		while ($product 	= mysqli_fetch_array($product_QR)) {
			if ($Ac_i==1) {
				?>
				<div class="row">
					<?
				}
				?>	
				<div class="col-md-3 col-xs-6">
					<? include 'index_panel_product.php'; ?>
				</div>
				<!-- col-md-4 -->
				<?
				if ($Ac_i==4) {
					$Ac_i=0;
					?>
				</div>
				<?
			}
			$Ac_i++;
		}
		if ($Ac_i!=1) {
			echo "</div>";
		}
		?>
		<!-- product -->

		<div class="row  margintop30 uppercase" >
			<div class="col-md-12">
				<ul class="breadcrumb no-radius" style="margin-bottom: 0px;">
					<li>
						<a onclick="goBack();" href="#">
							<? if($_SESSION[Language]== "Thailand"){echo "กลับ"; } else{echo "Back"; } ?> 
						</a>
					</li>    
					<li><a href="index.php"> <? if($_SESSION[Language]== "Thailand"){echo "หน้าแรก"; } else{echo "Home"; } ?> </a></li>
					<li class="active">
						<?
						$product_SL = " SELECT * FROM product WHERE product_id = '$product_id'";
						$product_QR = mysqli_query($con,$product_SL);
						$product 	= mysqli_fetch_array($product_QR);
						?>
						<?if($_SESSION[Language]== "Thailand"){	echo $product[product_name]; } else if($product[product_name_eng]!=''){	echo $product[product_name_eng];  }else{	echo $product[product_name];}?>
					</li>        
				</ul>
			</div>
		</div>


	</div>
	<!-- container -->
	<? include 'index_Footer.php'; ?>
</body>
</html>