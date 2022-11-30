
<div class="panel-set01 marginbottom15">
	<div class="panel panel-default ">
		<div class="panel panel-heading font1">
			ขนาด ไซส์
		</div>
		<div class="panel panel-body">
			<?
			$proportion_panel_SL = " SELECT * FROM proportion ORDER BY proportion_id ASC";
			$proportion_panel_QR 	= mysqli_query($con,$proportion_panel_SL);
			while ($proportion_panel 	= mysqli_fetch_array($proportion_panel_QR)) {
				?>
				<p>
					<a href="product.php?proportion_name=<?php echo $proportion_panel[proportion_name]; ?>">
						<?php echo $proportion_panel[proportion_name]; ?> 
					</a>
				</p>
				<?
			}
			?>
		</div>
	</div>
</div>
<div class="panel-set01 marginbottom15">
	<div class="panel panel-default ">
		<div class="panel panel-heading font1">
			หมวดหมู่สินค้า
		</div>
		<div class="panel panel-body">
			<?
			$catalog_panel_SL = " SELECT * FROM catalog ORDER BY catalog_id ASC";
			$catalog_panel_QR 	= mysqli_query($con,$catalog_panel_SL);
			while ($catalog_panel 	= mysqli_fetch_array($catalog_panel_QR)) {
				?>
				<p>
					<a href="product.php?catalog_name=<?php echo $catalog_panel[catalog_name]; ?>">
						<?php echo $catalog_panel[catalog_name]; ?> 
					</a>
				</p>
				<?
			}
			?>
		</div>
	</div>
</div>
<div class="panel-set01 marginbottom15">
	<div class="panel panel-default ">
		<div class="panel panel-heading font1">
			ตามสี
		</div>
		<div class="panel panel-body">
			<?
			$shade_SL = "SELECT * FROM shade order by shade_sort asc";
			$shade_QR 	= mysqli_query($con,$shade_SL);
			$MD=1;
			while ($shade     = mysqli_fetch_array($shade_QR)) {
				if ($MD==1) {
					?>

					<div class="row">
						<?php
					}
					?>  
					<div class="col-xs-6">
						<? include 'index_panel_shade.php'; ?>
					</div>
					<?php
					if ($MD==2) {
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
	</div>
</div>
<div class="panel-set01 marginbottom15">
	<div class="panel panel-default ">
		<div class="panel panel-heading font1">
			แบรนด์
		</div>
		<div class="panel panel-body">
			<?
			$brand_panel_SL = " SELECT * FROM brand ORDER BY brand_id ASC";
			$brand_panel_QR 	= mysqli_query($con,$brand_panel_SL);
			while ($brand_panel 	= mysqli_fetch_array($brand_panel_QR)) {
				?>
				<p>
					<a href="product.php?brand_name=<?php echo $brand_panel[brand_name]; ?>">
						<?php echo $brand_panel[brand_name]; ?> 
					</a>
				</p>
				<?
			}
			?>
		</div>
	</div>
</div>

<a href="product.php" class="btn btn-lg btn-black btn-block marginbottom15 font1 size25">
	ดูสินค้าทั้งหมด
</a>

