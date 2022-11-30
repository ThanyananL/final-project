<div id="computer" class="visible-lg" style="box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);background-color: white;">
	<div class="container">
		<div class="row" style="height: 60px;">
			<div class="col-md-3">
				<?
				if (isset($fixed[fixed_navlogo])&&trim($fixed[fixed_navlogo])!='') {
					?>
					<a  href="http://<? echo $fixed[fixed_website] ?>" >
						<img style="height: 50px;margin-top: 5px !important;" src="cloud/fixed_navlogo/<?php echo $fixed[fixed_navlogo]; ?>" />
					</a>
					<?
				}
				else if (isset($fixed[fixed_navbar])&&trim($fixed[fixed_navbar])!='') {
					?>
					<div class="betwixt15">
						<a class="size30 no-margin no-underline bold font1 color1" style="line-height: 40px !important;"  href="http://<? echo $fixed[fixed_website] ?>" >
							<?
							if($_SESSION[Language]== "Thailand"){
								echo $fixed[fixed_navbar]; 
							} 
							else if($fixed[fixed_navbar_eng]!=''){
								echo $fixed[fixed_navbar_eng];  
							}
							else{
								echo $fixed[fixed_navbar];
							}
							?>
						</a>
					</div>
					<?
				}
				?>
			</div>
			<div class="col-md-5 betwixt15" >
				<div style="padding-top: 12px;">
					<?
					$social_SL = " SELECT * FROM social ORDER BY social_sort ASC limit 3";
					$social_QR 	= mysqli_query($con,$social_SL);
					while ($social 	= mysqli_fetch_array($social_QR)) {
						?>
						<span  class="hide1" title="<?php echo $social[social_name]; ?>">
							<?
							if (isset($social[social_link])&&$social[social_link]!='') {

								if ($social[social_type]=='Tel') {
									?>
									<a style="color: #5b5b5b;"  href="tel:<?php echo $social[social_link]; ?>" target="_blank"> 
										<?
										if (isset($social[social_photo])&&$social[social_photo]!='') {
											?>
											<img style="max-height:20px;" src="cloud/social_photo/<?php echo $social[social_photo]; ?>" /> 
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
									<a style="color: #5b5b5b;"  href="http://<?php echo $social[social_link]; ?>" target="_blank"> 
										<?
										if (isset($social[social_photo])&&$social[social_photo]!='') {
											?>
											<img style="max-height:20px;" src="cloud/social_photo/<?php echo $social[social_photo]; ?>" /> 
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
								<a style="color: #5b5b5b;"> 
									<?
									if (isset($social[social_photo])&&$social[social_photo]!='') {
										?>
										<img style="max-height:20px;" src="cloud/social_photo/<?php echo $social[social_photo]; ?>" /> 
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
						</span>
						<?
					}
					?>

				</div>
			</div>
			<div class="col-md-4 betwixt15 text-right">
				<form class="form-inline" action="product.php" style="margin-bottom: 0px;">
					<div class="form-group">
						<input style="border-radius: 0px; box-shadow: none; border: 0;outline: 0;background: transparent;border-bottom: 1px solid #558c9b;"  type="text"  name="keyword" class="form-control" placeholder="<? if($_SESSION[Language]== "Thailand"){echo "ค้นหา"; } else{echo "Search"; } ?>..." required="">
					</div>
					<button type="submit" class="btn btn-main">
						<i class="glyphicon glyphicon-search size10 color6"></i>
					</button>
				</form>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-default  boxsha2 no-boxsha" style="border-top: none !important;">
		<div class="container">
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class=" <? if ($_SESSION['page'] == 'index.php') { echo 'active'; } ?> ">
						<a href="http://<? echo $fixed[fixed_website] ?>">
							หน้าแรก
						</a>
					</li>
					<li class="dropauto dropdown <? if ($_SESSION['page'] == 'product.php') { echo 'active'; } ?>">
						<a class="dropdown-toggle"  data-toggle="dropdown" href="">
							<? if ($_SESSION[Language]== "Thailand") {	 echo "สินค้าของเรา"; } else{ echo  "NEW IN";  } ?>
							<span class="caret" style="margin-left: -3px;color: #bbb;"></span>
						</a>
						<ul class="open-dropauto dropdown-menu">
							<li>
								<a  href="product.php">
									<? if ($_SESSION[Language]== "Thailand") {	 echo "สินค้าทั้งหมด"; } else{ echo  "All Product";  } ?>
								</a>
							</li>
							<?
							$catalog_nav_SL = " SELECT * FROM catalog ORDER BY catalog_sort ASC";
							$catalog_nav_QR 	= mysqli_query($con,$catalog_nav_SL);
							while ($catalog_nav 	= mysqli_fetch_array($catalog_nav_QR)) {
								?>
								<li class="dropauto2 dropdown-submenu" >
									<?
									$collection_nav_Select = "SELECT * FROM collection Where catalog_id = '$catalog_nav[catalog_id]' ORDER BY collection_sort ASC";
									$collection_nav_QR	= mysqli_query($con,$collection_nav_Select);
									$collection_nav_row = mysqli_num_rows($collection_nav_QR);
									if ($collection_nav_row > 0) {
										?>
										<a class="in-dropdown"  href="product.php?catalog_id=<? echo  $catalog_nav[catalog_id];?>">
											<? if($_SESSION[Language]== "Thailand"){ echo $catalog_nav[catalog_name]; } else if($catalog_nav[catalog_eng_name]!=''){ echo $catalog_nav[catalog_eng_name];  }else{echo $catalog_nav[catalog_name];} ?>
											<span class="caret"></span>
										</a>
										<ul class="open-dropauto2 dropdown-menu">
											<?
											while ($collection_nav 	= mysqli_fetch_array($collection_nav_QR)) {
												?>
												<li>
													<a  href="product.php?collection_id=<?php echo $collection_nav[collection_id]; ?>">
														<? if($_SESSION[Language]== "Thailand"){ echo $collection_nav[collection_name]; } else if($collection_nav[collection_eng_name]!=''){ echo $collection_nav[collection_eng_name];  }else{echo $collection_nav[collection_name];} ?>
													</a>
												</li>
												<?
											}
											?>
										</ul>
										<?
									}
									else{
										?>
										<a class="in-dropdown"  href="product.php?catalog_id=<? echo  $catalog_nav[catalog_id];?>">
											<? if($_SESSION[Language]== "Thailand"){ echo $catalog_nav[catalog_name]; } else if($catalog_nav[catalog_eng_name]!=''){ echo $catalog_nav[catalog_eng_name];  }else{echo $catalog_nav[catalog_name];} ?>
										</a>
										<?
									}
									?>
								</li>
								<?
							}
							?>
						</ul>
					</li>
					<li class=" <? if ($_SESSION['page'] == 'article.php') { echo 'active'; } ?> ">
						<a href="article.php">
							<? if($_SESSION[Language]== "Thailand"){echo "บทความและข่าวสาร"; } else{echo "Article"; } ?> 
						</a>
					</li>
					<li class="dropauto dropdown <? if ($_SESSION['page'] == 'howtoorder.php') { echo 'active'; } ?>">
						<a class="dropdown-toggle"  data-toggle="dropdown" href="">
							<? if($_SESSION[Language]== "Thailand"){echo "การสั่งซื้อ"; } else{echo "how to order"; } ?>
							<span class="caret" style="margin-left: -3px;color: #bbb;"></span>
						</a>
						<ul class="open-dropauto dropdown-menu">
							<li class="text1 <? if ($_SESSION['page'] == 'howtoorder.php') { echo 'active'; } ?> ">
								<a href="howtoorder.php">
									<? if($_SESSION[Language]== "Thailand"){echo "การสั่งซื้อ"; } else{echo "how to order"; } ?> 
								</a>
							</li>
							<li class="text1 <? if ($_SESSION['page'] == 'payment.php') { echo 'active'; } ?> ">
								<a href="payment.php">
									<? if($_SESSION[Language]== "Thailand"){echo "แจ้งโอนเงิน"; } else{echo "payment"; } ?>
								</a>
							</li>
							<li class="text1 <? if ($_SESSION['page'] == 'search_numbers.php') { echo 'active'; } ?> ">
								<a href="search_numbers.php">
									<? if($_SESSION[Language]== "Thailand"){echo "เลขพัสดุ"; } else{echo "tracking"; } ?>
								</a>
							</li>
						</ul>
					</li>

					<li class="dropauto dropdown <? if ($_SESSION['page'] == 'aboutus.php') { echo 'active'; } ?>">
						<a class="dropdown-toggle"  data-toggle="dropdown" href="">
							<? if($_SESSION[Language]== "Thailand"){echo "เกี่ยวกับเรา"; } else{echo "about us"; } ?>
							<span class="caret" style="margin-left: -3px;color: #bbb;"></span>
						</a>
						<ul class="open-dropauto dropdown-menu">
							<li class="text1 <? if ($_SESSION['page'] == 'aboutus.php') { echo 'active'; } ?> ">
								<a href="aboutus.php">
									<? if($_SESSION[Language]== "Thailand"){echo "เกี่ยวกับเรา"; } else{echo "about us"; } ?>
								</a>
							</li>
							<li class="text1 <? if ($_SESSION['page'] == 'contactus.php') { echo 'active'; } ?> ">
								<a href="contactus.php">
									<? if($_SESSION[Language]== "Thailand"){echo "ติดต่อเรา"; } else{echo "contact us"; } ?>
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right text1">
					<? 
					$product_cart_total = 0;
					$product_cart_amount = 0;
					$product_cart_sum = 0;
					if(isset($_SESSION[cart])){
						foreach($_SESSION[cart] as $product_id=>$product_amount){

							$product_cart_Sl = "SELECT * FROM product WHERE product_id = '$product_id'";
							$product_cart_Qr = mysqli_query($con,$product_cart_Sl);
							$product_cart = mysqli_fetch_array($product_cart_Qr);

							$product_cart_sum    = $product_cart[product_price]*$product_amount;
							$product_cart_total  += $product_cart_sum;
							$product_cart_amount += $product_amount;

						}
					}
					?>
					<a href="product_cart.php" class="btn btn-main navbar-btn">
						<span class="glyphicon glyphicon-shopping-cart size10"></span> 
						<?
						if ($product_cart_amount>0) {
							?>
							<? echo "$product_cart_amount"; ?> / ฿ <? echo number_format($product_cart_total); ?>
							<?
						}
						else{
							?>
							<? if($_SESSION[Language]== "Thailand"){echo "ตะกร้า"; } else{echo "cart"; } ?>
							<?
						}
						?>
					</a>
					<?
					if (trim($_SESSION['member_online_id'])!=""&&isset($_SESSION['member_online_id'])) {
						$order_listRow_SL = " SELECT * FROM order_list WHERE order_list_member_id = '$_SESSION[member_online_id]' AND order_list_status !='5' AND order_list_status !='4' ";
						$order_listRow_QR 	= mysqli_query($con,$order_listRow_SL);
						$order_listRow = mysqli_num_rows($order_listRow_QR);
						?>
						<span class="dropauto dropdown ">
							<a class="dropdown-toggle btn btn-main navbar-btn" data-toggle="dropdown" href="#">
								<span class="glyphicon glyphicon-user"></span>  
								<? echo $member[member_name]; ?>
								<?
								if ($order_listRow > 0) {
									?>
									<span class="badge bg-red" style="color: white !important;">
										<? echo $order_listRow; ?>
									</span>
									<?
								}
								?>
								<span class="caret"></span>
							</a>
							<ul class="open-dropauto dropdown-menu" style="margin-top: 0px !important;">
								<li>
									<a href="my_order.php"> 
										<? if($_SESSION[Language]== "Thailand"){echo "รายการสั่งซื้อ"; } else{echo "order"; } ?>
										<?
										if ($order_listRow > 0) {
											?>
											<span class="badge bg-red" style="color: white !important;" >
												<? echo $order_listRow; ?>
											</span>
											<?
										}
										?>
									</a>
								</li>
								<li>
									<a href="profile.php">  <? if($_SESSION[Language]== "Thailand"){echo "ข้อมูลส่วนตัว"; } else{echo "profile"; } ?> </a>
								</li>
								<li>
									<a href="Logout.php"><? if($_SESSION[Language]== "Thailand"){echo "ออกจากระบบ"; } else{echo "Logout"; } ?>  </a>
								</li>
							</ul>
						</span>
						<?
					}
					else{
						?>
						<a style="margin-right: " class="btn btn-main navbar-btn" href="#" data-toggle="modal" data-target="#login_modal" data-whatever="@mdo">  
							<? if($_SESSION[Language]== "Thailand"){echo "ล๊อกอิน"; } else{echo "Login"; } ?> 
						</a>
						<a class="btn btn-main navbar-btn" href="signup.php">  
							<? if($_SESSION[Language]== "Thailand"){echo "สมัครสมาชิก"; } else{echo "sign up"; } ?> 
						</a>
						<?
					}
					?>
				</ul>
			</div>
		</div>
	</nav>
</div>
<!-- Computer -->
<div id="phone">
	<nav class="navbar navbar-default navbar-fixed-top boxsha2 moblie-navbar hidden-lg" >
		<div class="navbar-header">
			<?
			if (isset($fixed[fixed_navlogo])&&trim($fixed[fixed_navlogo])!='') {
				?>
				<a class="navbar-brand no-padding padding10" style="padding-left: 0px !important;"  href="http://<? echo $fixed[fixed_website] ?>" >
					<img style="height: 30px;" src="cloud/fixed_navlogo/<?php echo $fixed[fixed_navlogo]; ?>" />
				</a>
				<?
			}
			else if (isset($fixed[fixed_navbar])&&trim($fixed[fixed_navbar])!='') {
				?>
				<a class="navbar-brand font1 color1" style="font-size: 20px;"  href="http://<? echo $fixed[fixed_website] ?>" >
					<?php echo $fixed[fixed_navbar]; ?>
				</a>
				<?
			}
			?>
			<button  style="margin-right: 5px;"  type="button " class="navbar-toggle btn-main" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar" style="background-color: white ;"></span>
				<span class="icon-bar" style="background-color: white ;"></span>
				<span class="icon-bar" style="background-color: white ;"></span> 
			</button>
			<a style="margin-right: 5px;" class="navbar-toggle btn btn-main padding6" href="#" data-toggle="modal" data-target="#login_modal" data-whatever="@mdo">  
				<? if($_SESSION[Language]== "Thailand"){echo "ล๊อกอิน"; } else{echo "Login"; } ?> 
			</a>
			<a style="margin-right: 5px;"  class="navbar-toggle btn btn-main padding6" href="signup.php">  
				<? if($_SESSION[Language]== "Thailand"){echo "สมัครสมาชิก"; } else{echo "sign up"; } ?> 
			</a>
			<a href="product_cart.php" class="navbar-toggle btn btn-main " style="padding-right: 10px !important;padding-top: 6px;padding-bottom: 6px;margin-right: 5px;">
				<span class="glyphicon glyphicon-shopping-cart" style="padding-left: 8px;padding-right: 8px;"></span>
				<?
				if ($product_amount>0) {
					?>
					<? echo "$product_cart_amount"; ?>  
					<?
				}
				?>  
			</a>
			<?
			if (trim($_SESSION['member_online_id'])!=""&&isset($_SESSION['member_online_id'])) {
				$order_listRow_SL = " SELECT * FROM order_list WHERE order_list_member_id = '$_SESSION[member_online_id]' AND order_list_status !='5' AND order_list_status !='4' ";
				$order_listRow_QR 	= mysqli_query($con,$order_listRow_SL);
				$order_listRow = mysqli_num_rows($order_listRow_QR);
				?>

				<a href="my_order.php" class="navbar-toggle btn btn-main padding6">
					<span class="glyphicon glyphicon-user"></span>
					<?
					if ($order_listRow > 0) {
						?>
						<span class="badge bg-red" style="color: white !important;">
							<? echo $order_listRow; ?>
						</span>
						<?
					}
					?>
				</a>
				<?
			}
			?>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav" >
				<li class=" <? if ($_SESSION['page'] == 'index.php') { echo 'active'; } ?> ">
					<a href="http://<? echo $fixed[fixed_website] ?>">
						<? if($_SESSION[Language]== "Thailand"){echo "หน้าแรก"; } else{echo "Home"; } ?>
					</a>
				</li>
				<li class="dropdown <? if ($_SESSION['page'] == 'product.php') { echo 'active'; } ?>">
					<a class="dropdown-toggle"  data-toggle="dropdown" href="">
						<? if($_SESSION[Language]== "Thailand"){echo "สินค้าของเรา"; } else{echo "product"; } ?>
						<span class="caret" style="margin-left: -3px;color: #bbb;"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a  href="product.php"><? if($_SESSION[Language]== "Thailand"){echo "สินค้าทั้งหมด"; } else{echo "All product"; } ?></a>
						</li>
						<?
						$catalog_nav_SL = " SELECT * FROM catalog ORDER BY catalog_sort ASC";
						$catalog_nav_QR 	= mysqli_query($con,$catalog_nav_SL);
						while ($catalog_nav 	= mysqli_fetch_array($catalog_nav_QR)) {
							?>
							<li>
								<a  href="product.php?catalog_id=<? echo  $catalog_nav[catalog_id];?>" >
									<?
									if($_SESSION[Language]== "Thailand"){
										echo $catalog_nav[catalog_name]; 
									} 
									else if($catalog_nav[catalog_name_eng]!=''){
										echo $catalog_nav[catalog_name_eng];  
									}
									else{
										echo $catalog_nav[catalog_name];
									}
									?>
								</a>
							</li>
							<?
						}
						?>
						<?
						$recommend_nav_SL = " SELECT * FROM recommend  ORDER BY recommend_id ASC";
						$recommend_nav_QR 	= mysqli_query($con,$recommend_nav_SL);
						while ($recommend_nav 	= mysqli_fetch_array($recommend_nav_QR)) {
							?>
							<li>
								<a href="product.php?recommend_name=<? echo  $recommend_nav[recommend_name];?>">
									<?
									if($_SESSION[Language]== "Thailand"){
										echo $recommend_nav[recommend_name]; 
									} 
									else if($recommend_nav[recommend_name_eng]!=''){
										echo $recommend_nav[recommend_name_eng];  
									}
									else{
										echo $recommend_nav[recommend_name];
									}
									?>
								</a>
							</li>
							<?
						}
						?>
					</ul>
				</li>
				<li class=" <? if ($_SESSION['page'] == 'article.php') { echo 'active'; } ?> ">
					<a href="article.php">
						<? if($_SESSION[Language]== "Thailand"){echo "บทความและข่าวสาร"; } else{echo "Article"; } ?> 
					</a>
				</li>
				<li class="dropdown <? if ($_SESSION['page'] == 'howtoorder.php') { echo 'active'; } ?>">
					<a class="dropdown-toggle"  data-toggle="dropdown" href="">
						<? if($_SESSION[Language]== "Thailand"){echo "การสั่งซื้อ"; } else{echo "how to order"; } ?>
						<span class="caret" style="margin-left: -3px;color: #bbb;"></span>
					</a>
					<ul class="dropdown-menu">
						<li class="text1 <? if ($_SESSION['page'] == 'howtoorder.php') { echo 'active'; } ?> ">
							<a href="howtoorder.php">
								<? if($_SESSION[Language]== "Thailand"){echo "การสั่งซื้อ"; } else{echo "how to order"; } ?> 
							</a>
						</li>
						<li class="text1 <? if ($_SESSION['page'] == 'payment.php') { echo 'active'; } ?> ">
							<a href="payment.php">
								<? if($_SESSION[Language]== "Thailand"){echo "แจ้งโอนเงิน"; } else{echo "payment"; } ?>
							</a>
						</li>
						<li class="text1 <? if ($_SESSION['page'] == 'search_numbers.php') { echo 'active'; } ?> ">
							<a href="search_numbers.php">
								<? if($_SESSION[Language]== "Thailand"){echo "เลขพัสดุ"; } else{echo "tracking"; } ?>
							</a>
						</li>
					</ul>
				</li>

				<li class="dropdown <? if ($_SESSION['page'] == 'aboutus.php') { echo 'active'; } ?>">
					<a class="dropdown-toggle"  data-toggle="dropdown" href="">
						<? if($_SESSION[Language]== "Thailand"){echo "เกี่ยวกับเรา"; } else{echo "about us"; } ?>
						<span class="caret" style="margin-left: -3px;color: #bbb;"></span>
					</a>
					<ul class="dropdown-menu">
						<li class="text1 <? if ($_SESSION['page'] == 'aboutus.php') { echo 'active'; } ?> ">
							<a href="aboutus.php">
								<? if($_SESSION[Language]== "Thailand"){echo "เกี่ยวกับเรา"; } else{echo "about us"; } ?>
							</a>
						</li>
						<li class="text1 <? if ($_SESSION['page'] == 'contactus.php') { echo 'active'; } ?> ">
							<a href="contactus.php">
								<? if($_SESSION[Language]== "Thailand"){echo "ติดต่อเรา"; } else{echo "contact us"; } ?>
							</a>
						</li>
					</ul>
				</li>	
			</ul>
			<ul class="nav navbar-nav navbar-right text1" style="padding-left: 15px;">
				<? 
				$product_cart_total = 0;
				$product_cart_amount = 0;
				$product_cart_sum = 0;
				if(isset($_SESSION[cart])){
					foreach($_SESSION[cart] as $product_id=>$product_amount){

						$product_cart_Sl = "SELECT * FROM product WHERE product_id = '$product_id'";
						$product_cart_Qr = mysqli_query($con,$product_cart_Sl);
						$product_cart = mysqli_fetch_array($product_cart_Qr);

						$product_cart_sum    = $product_cart[product_price]*$product_amount;
						$product_cart_total  += $product_cart_sum;
						$product_cart_amount += $product_amount;

					}
				}
				?>
				<a href="product_cart.php" class="btn btn-main navbar-btn">
					<span class="glyphicon glyphicon-shopping-cart size10"></span> 
					<?
					if ($product_cart_amount>0) {
						?>
						<? echo "$product_cart_amount"; ?> / ฿ <? echo number_format($product_cart_total); ?>
						<?
					}
					else{
						?>
						<? if($_SESSION[Language]== "Thailand"){echo "ตะกร้า"; } else{echo "cart"; } ?>
						<?
					}
					?>
				</a>
				<?
				if (trim($_SESSION['member_online_id'])!=""&&isset($_SESSION['member_online_id'])) {
					$order_listRow_SL = " SELECT * FROM order_list WHERE order_list_member_id = '$_SESSION[member_online_id]' AND order_list_status !='5' AND order_list_status !='4' ";
					$order_listRow_QR 	= mysqli_query($con,$order_listRow_SL);
					$order_listRow = mysqli_num_rows($order_listRow_QR);
					?>
					<span class="dropdown ">
						<a class="dropdown-toggle btn btn-main navbar-btn" data-toggle="dropdown" href="#">
							<span class="glyphicon glyphicon-user"></span>  
							<? echo $member[member_name]; ?>
							<?
							if ($order_listRow > 0) {
								?>
								<span class="badge bg-red" style="color: white !important;">
									<? echo $order_listRow; ?>
								</span>
								<?
							}
							?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" style="margin-top: 0px !important;">
							<li>
								<a href="my_order.php"> 
									<? if($_SESSION[Language]== "Thailand"){echo "รายการสั่งซื้อ"; } else{echo "order"; } ?>
									<?
									if ($order_listRow > 0) {
										?>
										<span class="badge bg-red" style="color: white !important;" >
											<? echo $order_listRow; ?>
										</span>
										<?
									}
									?>
								</a>
							</li>
							<li>
								<a href="profile.php">  <? if($_SESSION[Language]== "Thailand"){echo "ข้อมูลส่วนตัว"; } else{echo "profile"; } ?> </a>
							</li>
							<li>
								<a href="Logout.php"><? if($_SESSION[Language]== "Thailand"){echo "ออกจากระบบ"; } else{echo "Logout"; } ?>  </a>
							</li>
						</ul>
					</span>
					<?
				}
				else{
					?>
					<a style="margin-right: " class="btn btn-main navbar-btn" href="#" data-toggle="modal" data-target="#login_modal" data-whatever="@mdo">  
						<? if($_SESSION[Language]== "Thailand"){echo "ล๊อกอิน"; } else{echo "Login"; } ?> 
					</a>
					<a class="btn btn-main navbar-btn" href="signup.php">  
						<? if($_SESSION[Language]== "Thailand"){echo "สมัครสมาชิก"; } else{echo "sign up"; } ?> 
					</a>
					<?
				}
				?>
			</ul>
			<form class="navbar-form navbar-right" action="product.php" style="padding-top: 15px;margin-top: 0px;">
				<div class="input-group">
					<input  style="box-shadow: none;"  type="text" size="15" name="keyword" class="form-control" placeholder="<? if($_SESSION[Language]== "Thailand"){echo "ค้นหา"; } else{echo "Search"; } ?>" required="">
					<div class="input-group-btn">
						<button class="btn btn-main" type="submit">
							<i class="glyphicon glyphicon-search size10"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</nav>
</div>
<div class="modal fade" id="EN" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="color: black;">Language</h4>
			</div>
			<div class="modal-body">
				<div  id="google_translate_element" style="padding-top: 0px;padding-bottom: 0px;"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade text1" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="Lora" method="post" action="index_login.php">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="login_modalLabel"><span class="glyphicon glyphicon-user size16"></span>
						<? if($_SESSION[Language]== "Thailand"){echo "ล๊อกอิน"; } else{echo "Login"; } ?>
					</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label"> <? if($_SESSION[Language]== "Thailand"){echo "อีเมล หรือ เบอร์โทร "; } else{echo "Email or phone"; } ?> <span class="text-red"> * </span></label>
						<input minlength="6" maxlength="150"  required name="member_login" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label">  <? if($_SESSION[Language]== "Thailand"){echo "รหัสผ่าน "; } else{echo "password"; } ?> <span class="text-red"> * </span></label>
						<input minlength="6" maxlength="150" required name="member_password" type="password" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn marginbottom5 btn-main">
						<span class="	glyphicon glyphicon-log-in size14"></span>
						<? if($_SESSION[Language]== "Thailand"){echo "ล๊อกอิน"; } else{echo "Login"; } ?> 
					</button>
					<a href="signup.php" class="btn marginbottom5 btn-main" ><? if($_SESSION[Language]== "Thailand"){echo "สมัครสมาชิก"; } else{echo "signup"; } ?></a>
					<a href="ForgotPassword.php" class="btn marginbottom5 btn-default" ><? if($_SESSION[Language]== "Thailand"){echo "ลืมรหัสผ่าน"; } else{echo "Forgot Password"; } ?></a>
					<button type="button" class="btn marginbottom5 btn-default" data-dismiss="modal"><? if($_SESSION[Language]== "Thailand"){echo "ออก"; } else{echo "close"; } ?></button>
					<input type="hidden" name="index_login" value="x">
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade text1" id="login_modal_cart" tabindex="-1" role="dialog" aria-labelledby="login_modal_cartLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="Lora" method="post" action="Login.php">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="login_modal_cartLabel"><span class="glyphicon glyphicon-user size16"></span>
						<? if($_SESSION[Language]== "Thailand"){echo "ล๊อกอิน หรือ สมัครสมาชิกเพื่อทำการสั่งซื้อ"; } else{echo "Login"; } ?>
					</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label"> <? if($_SESSION[Language]== "Thailand"){echo "อีเมล หรือ เบอร์โทร "; } else{echo "Email or phone"; } ?> <span class="text-red"> * </span></label>
						<input minlength="6" maxlength="150"  required name="member_login" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label class="control-label"> <? if($_SESSION[Language]== "Thailand"){echo "รหัสผ่าน "; } else{echo "password"; } ?>  <span class="text-red"> * </span></label>
						<input minlength="6" maxlength="150" required name="member_password" type="password" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn marginbottom5 btn-main">
						<span class="	glyphicon glyphicon-log-in size14"></span>
						<? if($_SESSION[Language]== "Thailand"){echo "ล๊อกอิน"; } else{echo "Login"; } ?> 
					</button>
					<a href="signup.php" class="btn marginbottom5 btn-main" ><? if($_SESSION[Language]== "Thailand"){echo "สมัครสมาชิก"; } else{echo "signup"; } ?></a>
					<a href="ForgotPassword.php" class="btn marginbottom5 btn-default" ><? if($_SESSION[Language]== "Thailand"){echo "ลืมรหัสผ่าน"; } else{echo "Forgot Password"; } ?></a>
					<button type="button" class="btn marginbottom5 btn-default" data-dismiss="modal"><? if($_SESSION[Language]== "Thailand"){echo "ออก"; } else{echo "close"; } ?></button>
					<input type="hidden" name="SubmitLogin" value="x">
				</div>
			</form>
		</div>
	</div>
</div>

