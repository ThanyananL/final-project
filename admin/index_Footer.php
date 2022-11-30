
<?
if (trim($_SERVER[HTTP_ACCEPT_LANGUAGE])!='') {
	$Online = session_id();
	$time = time();
	$timeStatistic = time() - 600;
	$YYYY = date('Y-m-d');
	$sql = "select * from Online where session = '$Online'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	if($num > 0){
		mysqli_query($con,"update Online set time_online = '$time' where session = '$Online'");
	}
	else{
		mysqli_query($con,"insert into Online (session,time_online) values('$Online','$time')");
		$Statistic = "INSERT INTO `Statistic` (`StatisticID`, `StatisticDate`, `StatisticIP`, `StatisticTime`, `StatisticBrowser`, `StatisticLanguage`) 
		VALUES (NULL,'$YYYY','$_SERVER[REMOTE_ADDR] ', NOW(),'$_SERVER[HTTP_USER_AGENT]','$_SERVER[HTTP_ACCEPT_LANGUAGE]')";
		$StatisticQuery = mysqli_query($con,$Statistic);
	}
	$sql = "select * from Online where time_online > '$timeStatistic'";
	$result = mysqli_query($con,$sql);
	$Online_Now = mysqli_num_rows($result);
	if ($Online_Now == 10 ) {
		$strTo = "circleloops@gmail.com";
		$strSubject = $Fixed[FixedWebsite];
		$strHeader = "Content-type: text/html; charset=utf-8\n";
		$strHeader .= "From: ".$Fixed[FixedSent]."\n";
		$strMessage = "<p><b> คณะนี้มีผู้ใช้ออนไลน์ 10 คน </b></p> ";
		$strMessage .= "<p>  ".date('d-m-Y h:i:sa')." </p>  ";
		$strMessage .= "";
		$strMessage .= $Fixed[FixedWebsite];
		$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
	}
	if ($Online_Now == 50 ) {
		$strTo = "circleloops@gmail.com";
		$strSubject = $Fixed[FixedWebsite];
		$strHeader = "Content-type: text/html; charset=utf-8\n";
		$strHeader .= "From: ".$Fixed[FixedSent]."\n";
		$strMessage = "<p><b> คณะนี้มีผู้ใช้ออนไลน์ 50 คน </b></p> ";
		$strMessage .= "<p>  ".date('d-m-Y h:i:sa')." </p>  ";
		$strMessage .= "";
		$strMessage .= $Fixed[FixedWebsite];
		$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
	}
	$DaySl = "SELECT * FROM `Statistic` WHERE StatisticDate = '$YYYY' ";
	$DayQuery = mysqli_query($con,$DaySl);
	$DayNum = mysqli_num_rows($DayQuery);
	if ($DayNum == 100) {
		$strTo = "circleloops@gmail.com";
		$strSubject = $Fixed[FixedWebsite];
		$strHeader = "Content-type: text/html; charset=utf-8\n";
		$strHeader .= "From: ".$Fixed[FixedSent]."\n";
		$strMessage = "<p><b> วันนี้มีผู้เข้าขมเว็บไซต์  100 คนแล้ว </b></p> ";
		$strMessage .= "<p>  ".date('d-m-Y h:i:sa')." </p>  ";
		$strMessage .= "";
		$strMessage .= $Fixed[FixedWebsite];
		$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
	}
	if ($DayNum == 500) {
		$strTo = "circleloops@gmail.com";
		$strSubject = $Fixed[FixedWebsite];
		$strHeader = "Content-type: text/html; charset=utf-8\n";
		$strHeader .= "From: ".$Fixed[FixedSent]."\n";
		$strMessage = "<p><b> วันนี้มีผู้เข้าขมเว็บไซต์  500 คนแล้ว </b></p> ";
		$strMessage .= "<p>  ".date('d-m-Y h:i:sa')." </p>  ";
		$strMessage .= "";
		$strMessage .= $Fixed[FixedWebsite];
		$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
	}
	$AllSl = "SELECT * FROM `Statistic` ";
	$AllQuery = mysqli_query($con,$AllSl);
	$AllNum = mysqli_num_rows($AllQuery);
}
?>


<div class="container-fluid bg1">
	<div class="row" style="padding-top: 40px;padding-bottom: 30px;">
		<div class="container">
			<div class="row" id="Footer">

				<div class="col-md-3 col-sm-6">
					<div class="row">
						<div class="col-md-12">
							<h4 class="bold  uppercase">Contact Info</h4>
							<?
							$Social_SL = " SELECT * FROM Social ORDER BY SocialID ASC ";
							$Social_QR 	= mysqli_query($con,$Social_SL);
							while ($Social 	= mysqli_fetch_array($Social_QR)) {
								?>
								<p>
									<?
									if (isset($Social[SocialLink])&&$Social[SocialLink]!='') {

										if ($Social[SocialType]=='Tel') {
											?>
											<a  href="tel:<?php echo $Social[SocialLink]; ?>" target="_blank"> 
												<?
												if (isset($Social[SocialPhoto])&&$Social[SocialPhoto]!='') {
													?>
													<img style="max-height:25px;" src="Photo/SocialPhoto/<?php echo $Social[SocialPhoto]; ?>" /> 
													<?
												}
												else{
													echo $Social[SocialType]."  :  ";
												}
												?>
												<?php echo $Social[SocialName]; ?></a>
												<?
											}
											else{
												?>
												<a  href="http://<?php echo $Social[SocialLink]; ?>" target="_blank"> 
													<?
													if (isset($Social[SocialPhoto])&&$Social[SocialPhoto]!='') {
														?>
														<img style="max-height:25px;" src="Photo/SocialPhoto/<?php echo $Social[SocialPhoto]; ?>" /> 
														<?
													}
													else{
														echo $Social[SocialType]."  :  ";
													}
													?>
													<?php echo $Social[SocialName]; ?></a>
													<?
												}
											}
											else{
												?>
												<a> 
													<?
													if (isset($Social[SocialPhoto])&&$Social[SocialPhoto]!='') {
														?>
														<img style="max-height:25px;" src="Photo/SocialPhoto/<?php echo $Social[SocialPhoto]; ?>" /> 
														<?
													}
													else{
														echo $Social[SocialType]."  :  ";
													}
													?>
													<?php echo $Social[SocialName]; ?>  </a>
													<?
												}
												?>
											</p>
											<?
										}
										?>


										<h4 class="bold  uppercase top-margin2">Category</h4>
										<?
										$Catalog_SL = " SELECT * FROM Catalog ORDER BY CatalogID ASC";
										$Catalog_QR 	= mysqli_query($con,$Catalog_SL);
										while ($Catalog 	= mysqli_fetch_array($Catalog_QR)) {
											?>
											<p><a href="Product.php?CatalogID=<?php echo $Catalog[CatalogID]; ?>"><?php echo $Catalog[CatalogName]; ?></a></p>
											<?
										}
										?>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<h4 class="bold  uppercase">Quick Navigation</h4>
								<p class="<? if ($_SESSION['page'] == 'index.php') { echo 'active'; } ?>">
									<a href="index.php">
										หน้าแรก 
									</a>
								</p>
								<p class="<? if ($_SESSION['page'] == 'Product.php') { echo 'active'; } ?>">
									<a href="Product.php">
										สินค้าทั้งหมด
									</a>
								</p>
								<p class="<? if ($_SESSION['page'] == 'Article.php') { echo 'active'; } ?>">
									<a href="Article.php">
										บทความและข่าวสาร
									</a>
								</p>
								<p class="<? if ($_SESSION['page'] == 'HowTo.php') { echo 'active'; } ?>">
									<a href="HowTo.php">
										วิธีการสั่งซื้อ
									</a>
								</p>
								<p class="<? if ($_SESSION['page'] == 'Searchfornumbers.php') { echo 'active'; } ?>">
									<a href="Searchfornumbers.php">
										ค้นหาเลขพัสดุ
									</a>
								</p>
								<p class="<? if ($_SESSION['page'] == 'Payment.php') { echo 'active'; } ?>">
									<a href="Payment.php">
										แจ้งชำระเงิน
									</a>
								</p>
								<p class="<? if ($_SESSION['page'] == 'AboutUs.php') { echo 'active'; } ?>">
									<a href="AboutUs.php">
										เกี่ยวกับเรา
									</a>
								</p>
								<p class="<? if ($_SESSION['page'] == 'Contact.php') { echo 'active'; } ?>">
									<a href="Contact.php">
										ติดต่อเรา
									</a>
								</p>
							</div>
							<div class="col-md-3 col-sm-6 br-padding3">
								<h4 class="bold  uppercase"><? echo $Fixed[FixedCompany] ?></h4>
								<?
								$Content_SL = " SELECT * FROM Content WHERE ContentName = 'TagFooter'";
								$Content_QR = mysqli_query($con,$Content_SL);
								$Content 	= mysqli_fetch_array($Content_QR);
								?>
								<? echo $Content[ContentReview]; ?>
							</div>
							<div class="col-md-3 col-sm-6">
								<div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; width: 0px; height: 0px;"><div></div><div><iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="https://staticxx.facebook.com/connect/xd_arbiter/r/vy-MhgbfL4v.js?version=44#channel=f8998ce6bf0834&amp;origin=https%3A%2F%2Fwww.apidoh-office.com" style="border: none;"></iframe></div></div></div>
								<script>(function(d, s, id) {
									var js, fjs = d.getElementsByTagName(s)[0];
									if (d.getElementById(id)) return;
									js = d.createElement(s); js.id = id;
									js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.0&appId=140464089416756&autoLogAppEvents=1';
									fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));</script>
								<div class="fb-page fb_iframe_widget" height="260" data-href="https://www.facebook.com/Yuedpao/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=140464089416756&amp;container_width=263&amp;height=260&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2FYuedpao%2F&amp;locale=th_TH&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=timeline"><span style="vertical-align: bottom; width: 263px; height: 260px;"><iframe name="f30a0cb24e41d1c" width="1000px" height="260px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v3.0/plugins/page.php?adapt_container_width=true&amp;app_id=140464089416756&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fvy-MhgbfL4v.js%3Fversion%3D44%23cb%3Df2ca898880d4c0c%26domain%3Dwww.apidoh-office.com%26origin%3Dhttps%253A%252F%252Fwww.apidoh-office.com%252Ff8998ce6bf0834%26relation%3Dparent.parent&amp;container_width=263&amp;height=260&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2FYuedpao%2F&amp;locale=th_TH&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=timeline" style="border: none; visibility: visible; width: 263px; height: 260px;" class=""></iframe></span></div>
							</div>	
						</div>
					</div>
				</div>
			</div>

			<div class="container-fluid bg2">
				<div class="row" id="Footer">
					<div class="col-md-12 text-center">
						<h4  class="uppercase text-white size15">
							Copyright © 2019 <? echo $Fixed[FixedWebsite] ?> all right are <a target="_blank" href="https://www.apidoh.com" class="text-white">reserved.</a>
						</h4>
					</div>
				</div>
			</div>


			<div id="chat">
				<div class="dropup" >
					<button class="btn btn-default dropdown-toggle boxsha" type="button" data-toggle="dropdown">
						<span class="glyphicon glyphicon-comment"></span>
						ติดต่อ
					</button>
					<ul class="dropdown-menu  dropdown-menu-right">
						<?
						$Social_SL = " SELECT * FROM Social ORDER BY SocialType ASC ";
						$Social_QR 	= mysqli_query($con,$Social_SL);
						while ($Social 	= mysqli_fetch_array($Social_QR)) {
							?>
							<li style="font-size: 18px;">

								<?
								if (isset($Social[SocialLink])&&$Social[SocialLink]!='') {

									if ($Social[SocialType]=='Tel') {
										?>
										<a  href="tel:<?php echo $Social[SocialLink]; ?>" target="_blank"> 

											<?
											if (isset($Social[SocialPhoto])&&$Social[SocialPhoto]!='') {
												?>
												<img style="max-height:40px;" src="Photo/SocialPhoto/<?php echo $Social[SocialPhoto]; ?>" /> 
												<?
											}
											else{
												echo $Social[SocialType]."  :  ";
											}
											?>

											<?php echo $Social[SocialName]; ?>
										</a>
										<?
									}
									else{
										?>
										<a  href="http://<?php echo $Social[SocialLink]; ?>" target="_blank"> 
											<?
											if (isset($Social[SocialPhoto])&&$Social[SocialPhoto]!='') {
												?>
												<img style="max-height:40px;" src="Photo/SocialPhoto/<?php echo $Social[SocialPhoto]; ?>" /> 
												<?
											}
											else{
												echo $Social[SocialType]."  :  ";
											}
											?>
											<?php echo $Social[SocialName]; ?>
										</a>
										<?
									}
								}
								else{
									?>
									<a> 
										<?
										if (isset($Social[SocialPhoto])&&$Social[SocialPhoto]!='') {
											?>
											<img style="max-height:40px;" src="Photo/SocialPhoto/<?php echo $Social[SocialPhoto]; ?>" /> 
											<?
										}
										else{
											echo $Social[SocialType]."  :  ";
										}
										?>
										<?php echo $Social[SocialName]; ?> 
									</a>
									<?
								}
								?>
							</li>
							<?
						}
						?>
					</ul>
				</div>
			</div>


