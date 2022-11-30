<div class="container-fluid  Footer  paddingtop25">
	<div class="row">
		<div class="col-md-12">
			<div class="container">
				<div class="col-md-12" >
					<div class="row between15">
						<div class="col-md-3">
							<p class=" uppercase size18 font1 bold ">   <? if($_SESSION[Language]== "Thailand"){echo "แผนผังเว็บไซต์"; } else{echo "Sitemap"; } ?> </p>
							<li class=" <? if ($_SESSION['page'] == 'index.php') { echo 'active'; } ?> ">
								<a href="http://<? echo $fixed[fixed_website] ?>">
									<? if($_SESSION[Language]== "Thailand"){echo "หน้าแรก"; } else{echo "Home"; } ?>
								</a>
							</li>
							<li>
								<a href="product.php">
									<? if($_SESSION[Language]== "Thailand"){echo "สินค้าของเรา"; } else{echo "product"; } ?>
								</a>
							</li>
							<li class=" <? if ($_SESSION['page'] == 'article.php') { echo 'active'; } ?> ">
								<a href="article.php">
									
									<? if($_SESSION[Language]== "Thailand"){echo "บทความและข่าวสาร"; } else{echo "Article"; } ?> 
									
								</a>
							</li>
							<li class=" <? if ($_SESSION['page'] == 'howtoorder.php') { echo 'active'; } ?> ">
								<a href="howtoorder.php">
									<? if($_SESSION[Language]== "Thailand"){echo "การสั่งซื้อ"; } else{echo "how to order"; } ?> 
								</a>
							</li>
							<li class=" <? if ($_SESSION['page'] == 'payment.php') { echo 'active'; } ?> ">
								<a href="payment.php">
									
									<? if($_SESSION[Language]== "Thailand"){echo "แจ้งโอนเงิน"; } else{echo "payment"; } ?>
									
								</a>
							</li>
							<li class=" <? if ($_SESSION['page'] == 'search_numbers.php') { echo 'active'; } ?> ">
								<a href="search_numbers.php">
									<? if($_SESSION[Language]== "Thailand"){echo "เลขพัสดุ"; } else{echo "tracking"; } ?>
								</a>
							</li>
							<li class="text1 <? if ($_SESSION['page'] == 'aboutus.php') { echo 'active'; } ?> ">
								<a href="aboutus.php">
									<? if($_SESSION[Language]== "Thailand"){echo "เกี่ยวกับเรา"; } else{echo "about us"; } ?>
								</a>
							</li>
							<li class=" <? if ($_SESSION['page'] == 'contactus.php') { echo 'active'; } ?> ">
								<a href="contactus.php">
									<? if($_SESSION[Language]== "Thailand"){echo "ติดต่อเรา"; } else{echo "contact us"; } ?>
								</a>
							</li>
						</div>	
						<div class="col-md-3">
							<p class=" uppercase size18 font1 bold ">
								<? if($_SESSION[Language]== "Thailand"){echo "หมวดหมู่"; } else{echo "categories"; } ?>
							</p>
							<?
							$catalog_footer_SL = " SELECT * FROM catalog ORDER BY catalog_sort asc limit 8 ";
							$catalog_footer_QR 	= mysqli_query($con,$catalog_footer_SL);
							while ($catalog_footer 	= mysqli_fetch_array($catalog_footer_QR)) {
								?>
								<li  class="hide1" title="<?php echo $catalog_footer[catalog_name]; ?>">
									<a href="product.php?catalog_id=<? echo  $catalog_footer[catalog_id];?>">
										<?
										if($_SESSION[Language]== "Thailand"){
											echo $catalog_footer[catalog_name]; 
										} 
										else if($catalog_footer[catalog_name_eng]!=''){
											echo $catalog_footer[catalog_name_eng];  
										}
										else{
											echo $catalog_footer[catalog_name];
										}
										?>
										
									</a>
								</li>
								<?
							}
							?>
						</div>
						<div class="col-md-3">
							<p class=" uppercase size18 font1 bold ">
								<? if($_SESSION[Language]== "Thailand"){echo "ข้อมูลติดต่อ"; } else{echo "contact"; } ?>
							</p>
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
						<div class="col-md-3">
							<?
							$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'TagFooter'";
							$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
							$pagecontent 	= mysqli_fetch_array($pagecontent_QR);
							?>
							<? if($_SESSION[Language]== "Thailand"){ echo $pagecontent[pagecontent_review]; } else if($pagecontent[pagecontent_review_eng]!=''){ echo $pagecontent[pagecontent_review_eng];  }else{echo $pagecontent[pagecontent_review];} ?>
							<div class="row margintop10">
								<?
								$qrcode_SL = " SELECT * FROM qrcode ORDER BY qrcode_sort ASC ";
								$qrcode_QR 	= mysqli_query($con,$qrcode_SL);
								while ($qrcode 	= mysqli_fetch_array($qrcode_QR)) {
									?>
									<div class="col-xs-12 paddingbottom15">
										<?
										if (isset($qrcode[qrcode_link])&&$qrcode[qrcode_link]!='') {
											if ($qrcode[qrcode_type]=='Tel') {
												?>
												<a class="marginbottom10"  href="tel:<?php echo $qrcode[qrcode_link]; ?>" target="_blank"> 
													<?
													if (isset($qrcode[qrcode_photo])&&$qrcode[qrcode_photo]!='') {
														?>
														<img class="img-responsive" src="cloud/qrcode_photo/<?php echo $qrcode[qrcode_photo]; ?>" /> 
														<?
													}
													?>
												</a>
												<?
											}
											else{
												?>
												<a class="marginbottom10"  href="http://<?php echo $qrcode[qrcode_link]; ?>" target="_blank"> 
													<?
													if (isset($qrcode[qrcode_photo])&&$qrcode[qrcode_photo]!='') {
														?>
														<img class="img-responsive" src="cloud/qrcode_photo/<?php echo $qrcode[qrcode_photo]; ?>" /> 
														<?
													}
													?>
												</a>
												<?
											}
										}
										else{
											?>
											<a class="marginbottom10"> 
												<?
												if (isset($qrcode[qrcode_photo])&&$qrcode[qrcode_photo]!='') {
													?>
													<img class="img-responsive" style="cursor: zoom-in;max-width: 200px;" id="qrcode<?php echo $qrcode[qrcode_id]; ?>" src="cloud/qrcode_photo/<?php echo $qrcode[qrcode_photo]; ?>"  />
													<div id="qrcode" class="w3-modal">
														<span class="zoom-close w3-close">&times;</span>
														<img class="w3-modal-content w3-close" id="qrcode_photo" style="width: 500px;">
													</div>
													<script>
														var w3modal = document.getElementById("qrcode");
														var img = document.getElementById("qrcode<?php echo $qrcode[qrcode_id]; ?>");
														var modalImg = document.getElementById("qrcode_photo");
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
												}
												?>
											</a>
											<?
										}
										?>
									</div>
									<?
								}
								?>
							</div>
							<?
							if (isset($fixed[fixed_pluginpage])&&trim($fixed[fixed_pluginpage])!='') {
								?>
								<p>
									<div id="fb-root"></div>
									<script>(function(d, s, id) {
										var js, fjs = d.getElementsByTagName(s)[0];
										if (d.getElementById(id)) return;
										js = d.createElement(s); js.id = id;
										js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.1&appId=140464089416756&autoLogAppEvents=1';
										fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));</script>
									<div class="fb-page" height="0" data-href="https://<? echo $fixed[fixed_pluginpage]; ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://<? echo $fixed[fixed_pluginpage]; ?>" class="fb-xfbml-parse-ignore"><a href="https://<? echo $fixed[fixed_pluginpage]; ?>"></a></blockquote></div>
								</p>
								<?
							}
							?>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid Footer2" >
	<div class="col-md-12">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p  style="padding-top: 15px;padding-bottom: 5px;" class="uppercase size13">
						Copyright © 2021<? if (date("Y")!='2021') {	echo "-".date ("Y");		}  echo " ".$fixed[fixed_website]; ?>  all right are reserved.
					</p>
				</div>
				<div class="col-md-6 text-right">
					<p  style="padding-top: 15px;padding-bottom: 5px;" class="uppercase size13 hide1">
						<? echo $fixed[fixed_company]; ?> 
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var swiper = new Swiper('.swiper-container', {
		spaceBetween: 30,
		centeredSlides: true,
		autoplay: {
			delay: 6000,
			disableOnInteraction: false,
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});
</script>
<?
if (trim($_SERVER[HTTP_ACCEPT_LANGUAGE])!='') {
	$Online = session_id();
	$time = time();
	$timeStatistic = time() - 300;
	$YYYY = date('Y-m-d');
	$sql = "select * from Online where session = '$Online'";
	$result = mysqli_query($con,$sql);
	$Check_Online = mysqli_num_rows($result);
	if($Check_Online > 0 ){
		mysqli_query($con,"update Online set time_online = '$time' where session = '$Online'");
	}
	else{
		mysqli_query($con,"insert into Online (session,time_online) values('$Online','$time')");
		$Statistic = "INSERT INTO `Statistic` (`StatisticID`, `StatisticDate`, `StatisticIP`, `StatisticTime`, `StatisticBrowser`, `StatisticLanguage`) 
		VALUES (NULL,'$YYYY','$_SERVER[REMOTE_ADDR] ', NOW(),'$_SERVER[HTTP_USER_AGENT]','$_SERVER[HTTP_ACCEPT_LANGUAGE]')";
		$StatisticQuery = mysqli_query($con,$Statistic);
	}
}
?>
