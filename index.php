<?
include 'index_Include.php'; 
$_SESSION['page'] = 'index.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="canonical" href="https://<? echo $fixed[fixed_website]; ?>" >
	<title> <? echo $fixed[fixed_company]; ?> - <? echo $fixed[fixed_topic]; ?> | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>) ">
	<meta name="keywords" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<meta name="author" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navber.php'; ?>
	<? include 'index_slides.php'; ?>
	<?
	$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'Home'";
	$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
	$pagecontent 	= mysqli_fetch_array($pagecontent_QR);
	if (isset($pagecontent[pagecontent_review])&&trim($pagecontent[pagecontent_review])!='') {
		?>
		<div >
			<div class="container betwixt20 ">
				<div class="row">
					<div class="col-md-12">
						<?
						if($_SESSION[Language]== "Thailand"){
							echo $pagecontent[pagecontent_review]; 
						} 
						else if($pagecontent[pagecontent_review_eng]!=''){
							echo $pagecontent[pagecontent_review_eng];  
						}
						else{
							echo $pagecontent[pagecontent_review];
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?
	}
	?>
	<!-- catalog -->
	<div class="bg-white">
		<div class="container betwixt30">
			<?
			$catalog_SL = "SELECT * FROM catalog order by catalog_sort asc";
			$catalog_QR 	= mysqli_query($con,$catalog_SL);
			$catalog_Row 	= mysqli_num_rows($catalog_QR);
			$i=1;
			while ($catalog     = mysqli_fetch_array($catalog_QR)) {
				if ($i==1) {
					?>
					<div class="row">
						<?php
					}
					?>  
					<div class="col-md-3">
						<? include 'index_panel_catalog.php'; ?>
					</div>
					<?php
					if ($i==4) {
						$i=0;
						?>
					</div>
					<?
				}
				$i++;
			}
			if ($i!=1) {
				echo "</div>";
			}
			?>
		</div>
	</div>
	<!-- catalog -->

	<!-- product -->
	<?
	$product_SL = "SELECT * FROM product WHERE ( product_status_id != '3' AND  product_status_id != '2') AND recommend_name LIKE  '%สินค้าแนะนำ%'  ORDER BY product_datetime DESC limit 4";
	$product_QR 	= mysqli_query($con,$product_SL);
	$product_Row 	= mysqli_num_rows($product_QR);
	if ($product_Row>0) {
		?>
		<div>
			<div class="container betwixt20">
				<div class="row br">
					<div class="col-md-12">
						<span class="pagetopic">สินค้าแนะนำ</span> 
					</div>
				</div>
				<?
				$i=1;
				$product_active = 1;
				while ($product     = mysqli_fetch_array($product_QR)) {
					if ($i==1) {
						?>
						<div class="row">
							<?php
						}
						?>  
						<div class="col-md-3 col-xs-6">
							<? include 'index_panel_product.php'; ?>
						</div>
						<?php
						if ($i==4) {
							$i=0;
							$product_active++;
							?>
						</div>
						<?
					}
					$i++;

				}
				if ($i!=1) {

					echo "</div>";
				}
				?>
				<div class="row">
					<div class="col-md-9"></div>
					<div class="col-md-3">
						<a  class="btn btn-default btn-block" href="product.php?recommend_name=สินค้าแนะนำ">สินค้าแนะนำเพิ่มเติม</a>
					</div>
				</div>
			</div>
		</div>
		<?
	}
	?>
	<!-- product -->


	<!-- product -->
	<?
	$product_SL = "SELECT * FROM product WHERE ( product_status_id != '3' AND  product_status_id != '2')   ORDER BY product_datetime DESC limit 8";
	$product_QR 	= mysqli_query($con,$product_SL);
	$product_Row 	= mysqli_num_rows($product_QR);
	if ($product_Row>0) {
		?>
		<div>
			<div class="container betwixt20">
				<div class="row br">
					<div class="col-md-12">
						<span class="pagetopic"><? if($_SESSION[Language]== "Thailand"){echo "สินค้ามาใหม่"; } else{echo "most recent"; } ?></span>
					</div>
				</div>
				<?
				$i=1;
				$product_active = 1;
				while ($product     = mysqli_fetch_array($product_QR)) {
					if ($i==1) {
						?>
						<div class="row">
							<?php
						}
						?>  
						<div class="col-md-3 col-xs-6">
							<? include 'index_panel_product.php'; ?>
						</div>
						<?php
						if ($i==4) {
							$i=0;
							$product_active++;
							?>
						</div>
						<?
					}
					$i++;

				}
				if ($i!=1) {

					echo "</div>";
				}
				?>
				<div class="row">
					<div class="col-md-9"></div>
					<div class="col-md-3">
						<a  class="btn btn-default btn-block"  href="product.php" >สินค้าเพิ่มเติม</a>
					</div>
				</div>
			</div>
		</div>
		<?
	}
	?>
	<!-- product -->

	
	<!-- article -->
	<div >
		<div class="container betwixt30">
			<div class="row marginbottom15">
				<div class="col-md-12">
					<span class="pagetopic">บทความ & ข่าวสาร</span> 
				</div>
			</div>
			<?
			$article_SL = "SELECT * FROM article order by article_sort asc limit 3";
			$article_QR 	= mysqli_query($con,$article_SL);
			$article_Row 	= mysqli_num_rows($article_QR);
			$i=1;
			while ($article     = mysqli_fetch_array($article_QR)) {
				if ($i==1) {
					?>
					<div class="row">
						<?php
					}
					?>  
					<div class="col-md-4">
						<? include 'index_panel_article.php'; ?>
					</div>
					<?php
					if ($i==3) {
						$i=0;
						?>
					</div>
					<?
				}
				$i++;
			}
			if ($i!=1) {
				echo "</div>";
			}
			?>
			<div class="row">
				<div class="col-md-9">
					
				</div>
				<div class="col-md-3">
					<a class="btn btn-default btn-block" href="article.php">บทความ & ข่าวสาร เพิ่มเติม</a>
				</div>
			</div>
		</div>
	</div>
	<!-- article -->



</div>
<?  include 'index_Footer.php'; ?>
</body>
</html>