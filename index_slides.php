<?
$slides_SL = " SELECT * FROM slides  ORDER BY slides_sort ASC";
$slides_QR 	= mysqli_query($con,$slides_SL);
$slides_Row = mysqli_num_rows($slides_QR);
if ($slides_Row>0) {
	?>
	<div class="container-fluid" >
		<div class="row">
			<div id="myCarousel" class="carousel slide" data-interval="50000"  data-ride="carousel" data-pause="false" style="width: 100%;margin: auto;">
				<ol class="carousel-indicators hidden-xs hidden-sm">
					<? for ($x=0; $x < $slides_Row ; $x++) { ?>
						<li data-target="#myCarousel" data-slide-to="<? echo $x; ?>" class="<?  if ($x==0) { echo 'active'; } ?>"></li>
					<? } ?> 
				</ol>
				<div class="carousel-inner">
					<?
					$i=1;
					while ($slides 	= mysqli_fetch_array($slides_QR)) {
						?>
						<div class="item <?  if ($i==1) { echo 'active'; } ?> ">
							<img id="slides-img"    <? if((isset($slides[slides_detail])&&trim($slides[slides_detail])!='')){  ?> class="tinted" <?  } ?>  src="cloud/slides_photo/<?php echo $slides[slides_photo]; ?>" >
							<?
							if (isset($slides[slides_topic])&&$slides[slides_topic]!='') {
								?>
								<div class="carousel-caption hidden-xs hidden-sm" style="margin-bottom: 18%;">
									<a <? if (isset($slides[slides_link])&&$slides[slides_link]!='') { echo "href='http://".$slides[slides_link]."'"; echo "target='_blank'"; } ?>   class="btn btn-red btn-lg boxsha no-border" style="font-size: 25px;padding: 13px;opacity: 0.9;filter: alpha(opacity=9);" >
										<?php echo $slides[slides_topic]; ?>
									</a>
								</div>
								<div class="carousel-caption visible-xs visible-sm" style="margin-bottom: 2%;">
									<a <? if (isset($slides[slides_link])&&$slides[slides_link]!='') { echo "href='http://".$slides[slides_link]."'"; echo "target='_blank'"; } ?>   class="btn btn-red boxsha no-border" style="font-size: 15px;padding: 5px;opacity: 0.9;filter: alpha(opacity=9);" >
										<?php echo $slides[slides_topic]; ?>
									</a>
								</div>
								<?
							}
							if (isset($slides[slides_detail])&&trim($slides[slides_detail])!='') {
								?>
								<div class="carousel-caption hidden-xs hidden-sm" style="margin-bottom: 10%;">
									<p style="color: white;font-size: 20px;">
										<?
										if (isset($slides[slides_detail])&&$slides[slides_detail]!='') {
											echo $slides[slides_detail]; 
										}
										?>
									</p>
								</div>
								<div class="carousel-caption visible-xs visible-sm" style="margin-bottom: 13%;">
									<p style="color: white;font-size: 15px;">
										<?
										if (isset($slides[slides_detail])&&$slides[slides_detail]!='') {
											echo $slides[slides_detail]; 
										}
										?>
									</p>
								</div>
								<?
							}
							if (isset($slides[slides_link])&&trim($slides[slides_link])!='') {
								?>
								<div class="carousel-caption hidden-xs hidden-sm" style="margin-bottom: 5%;">
									<a target="_blank"  href="http://<? echo $slides[slides_link]; ?>"  class="btn btn-red boxsha no-border " style="font-size: 13px;padding: 7px;opacity: 0.9;filter: alpha(opacity=9);" >
										รายละเอียดเพิ่มเติม
									</a>
								</div>
								<?
							}
							?>
						</div>
						<?php
						$i++;
					}
					?>
				</div>
				<a class="left carousel-control " href="#myCarousel" data-slide="prev">
					<img src="cloud/Group 62.png" style="width:48px;height:48px;position: absolute;top: 50%;z-index: 5;display: inline-block;margin-top: -20px;left: 10%;">
				</a>
				<a class="right carousel-control " href="#myCarousel" data-slide="next">
					<img src="cloud/Group 61.png" style="width:48px;height:48px;position: absolute;top: 50%;z-index: 5;display: inline-block;margin-top: -20px;right: 10%;">
				</a>
			</div>

		</div>
	</div>
	
	<?
}
?>

