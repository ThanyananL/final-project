<?
include 'index_Include.php'; 
$_SESSION['page'] = 'product_cart.php';


if ($_GET[add_cart]) {
	$product_id = $_REQUEST['product_id'];
	$product_amount = $_REQUEST['product_amount'];
	$_SESSION['cart'][$product_id]=$product_amount;
}

if ($_GET[remove_cart]=='remove') {
	$product_id = $_REQUEST['product_id'];
	unset($_SESSION[cart][$product_id]);
}

$total_cart = 0;
if (isset($_SESSION[cart])) {
	foreach($_SESSION[cart] as $cart) {
		$total_cart += $cart;
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title> <? if($_SESSION[Language]== "Thailand"){echo "ตะกร้าสินค้า"; } else{echo "Cart"; } ?> | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>) ">
	<meta name="keywords" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<meta name="author" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navber.php'; ?>
	<div class="container">
		<div class="row margintop30">
			<div class="col-md-12 resize">
				<p class="  pagetopic">
					<? if($_SESSION[Language]== "Thailand"){echo "ตะกร้าสินค้า"; } else{echo "Cart"; } ?> 
				</p>
			</div>
		</div>
		<?
		if( isset($_SESSION[cart]) &&  $total_cart > '0'){
			?>
			<div class="row">
				<!-- col-md-9 -->
				<div class="col-md-9">
					<?php
					$total = 0;
					$amount = 0;
					$i=1;
					foreach($_SESSION[cart] as $product_id=>$product_amount){

						$product_Sl = "SELECT * FROM product WHERE product_id = '$product_id'";
						$product_Qr = mysqli_query($con,$product_Sl);
						$product = mysqli_fetch_array($product_Qr);

						$order_list_weight += $product[product_weight]*$product_amount;
						$sum    = $product[product_price]*$product_amount;
						$total  += $sum;
						$amount += $product_amount;

						?>
						<div class="panel panel-default no-boxsha text1 radius20" style="overflow: hidden !important; ">
							<div class="panel-body bg-white">
								<div class="row">
									<div class="col-md-1 col-xs-4">
										<?
										if (isset($product[product_photo])&&trim($product[product_photo]!='')) {
											?>
											<img class="full" src="cloud/product_photo/<?php echo $product[product_photo]; ?>"   />
											<?
										}
										else{
											?>
											<img class="full" src="cloud/product_photo/<?php echo $product[product_photo]; ?>"   />
											<?
										}
										?>
									</div>
									<div class="col-md-3">
										<div class="bold size13">  <? if($_SESSION[Language]== "Thailand"){echo "สินค้า"; } else{echo "product"; } ?>  </div>
										<div class="size13">
											<?if($_SESSION[Language]== "Thailand"){	echo $product[product_name]; } else if($product[product_name_eng]!=''){	echo $product[product_name_eng];  }else{	echo $product[product_name];}?>
										</div>
									</div>
									<div class="col-md-2">
										<div class="bold size13">  <? if($_SESSION[Language]== "Thailand"){echo "ราคา"; } else{echo "price"; } ?> </div>
										<div class="size13">
											<? echo number_format($product[product_price]); ?>   <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?>
										</div>
									</div>
									<div class="col-md-2">
										<div class="bold size13"> <? if($_SESSION[Language]== "Thailand"){echo "จำนวน"; } else{echo "amount"; } ?> </div>
										<div class="size13">
											<?php echo $product_amount; ?>
										</div>
									</div>
									<div class="col-md-2">
										<div class="bold size13"> <? if($_SESSION[Language]== "Thailand"){echo "ราคารวม"; } else{echo "total price"; } ?> </div>
										<div class="size13">
											<?php echo number_format($sum); ?> <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?> 
										</div>
									</div>
									<div class="col-md-2">
										<a href='product_cart.php?product_id=<?php echo $product_id;?>&remove_cart=remove' class="btn btn-main btn-sm" name="remove"> <? if($_SESSION[Language]== "Thailand"){echo "ลบ"; } else{echo "remove"; } ?> </a>
									</div>
								</div>
							</div>
						</div>
						<?php
						$i++;
					}
					$_SESSION[total] = $total; 
					$_SESSION[amount] = $amount; 
					$_SESSION[order_list_weight] = $order_list_weight;
					?>
				</div>
				<!-- col-md-9 -->

				<!-- col-md-3 -->
				<div class="col-md-3">
					<div class="panel panel-default no-boxsha text1 radius20" style="overflow: hidden;">
						<div class="panel-body bg-white">
							<form method="get" action="portage.php">
								<div class="row">
									<div class="col-md-12 text-right">
										<h4>  <? if($_SESSION[Language]== "Thailand"){echo "จำนวน"; } else{echo "amount"; } ?>  : <? echo $amount; ?>  </h4>
										<h4>  <? if($_SESSION[Language]== "Thailand"){echo "ราคารวม"; } else{echo "total price"; } ?>  : <?php echo number_format($total); ?> <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?> </h4>
									</div>
									<div class="col-md-12 marginbottom15">
										<select class="form-control"  name="portage_id" required>
											<?
											$portage_SL = " SELECT * FROM portage WHERE portage_id != '$product[portage_id]' ORDER BY portage_id ASC";
											$portage_QR 	= mysqli_query($con,$portage_SL);
											while ($portage 	= mysqli_fetch_array($portage_QR)) {
												$weight_Sl 	= "SELECT * FROM weight WHERE weight_min <= '$_SESSION[order_list_weight]' AND weight_max >= '$_SESSION[order_list_weight]'  AND (portage_id = '$portage[portage_id]') ";
												$weight_RS 	= mysqli_query($con,$weight_Sl); 
												$weight 		= mysqli_fetch_array($weight_RS);
												?>
												<option value="<?php echo $portage[portage_id]; ?>"> 
													<?php echo $portage[portage_name]; ?>  (<? echo $weight[weight_price]; ?> <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?>)
												</option>
												<?
											}
											?>
										</select>
									</div>
									<div class="col-md-12 marginbottom15">
										<select class="form-control"  name="cash_on_id" required>
											<?
											$cash_on_SL = " SELECT * FROM cash_on WHERE cash_on_id != '$product[cash_on_id]' ORDER BY cash_on_id ASC";
											$cash_on_QR 	= mysqli_query($con,$cash_on_SL);
											while ($cash_on 	= mysqli_fetch_array($cash_on_QR)) {
												?>
												<option value="<?php echo $cash_on[cash_on_id]; ?>"> 
													<?if($_SESSION[Language]== "Thailand"){	echo $cash_on[cash_on_name]; } else if($cash_on[cash_on_name_eng]!=''){	echo $cash_on[cash_on_name_eng];  }else{	echo $cash_on[cash_on_name];}?> 
												</option>
												<?
											}
											?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 br">
										<a href="product.php" class="btn btn-default  btn-block text-black"><? if($_SESSION[Language]== "Thailand"){echo "เลือกซื้อสินค้าต่อ"; } else{echo "Continue shopping"; } ?></a>
									</div>
									<div class="col-md-12">	
										<?
										if ($_SESSION[cart]=="" || !isset($_SESSION[cart]) || $_SESSION[cart]==NULL) {
											?>
											<a onclick="portage()" class="btn btn-main  btn-block ani-bounce" href="">ดำเนินการสั่งซื้อ</a>
											<script>
												function portage() {
													alert("ไม่มีสินค้าในตะกร้า");
												}
											</script>
											<?
										}
										else if (trim($_SESSION['member_online_id'])==""&&!isset($_SESSION['member_online_id'])) {
											?>
											<a href="address.php" class="btn btn-main  btn-block ani-bounce" >  
												ดำเนินการสั่งซื้อ
											</a>
											<?
										}
										else{
											?>
											<input type="submit" class="btn btn-main  btn-block ani-bounce" value="ดำเนินการสั่งซื้อ">
											<?
										}
										?>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- col-md-3 -->

			</div>
			<!-- row -->
			<?
		}
		else{
			?>
			<div class="row">
				<!-- 9 -->
				<div class="col-md-9">
					<div class="panel panel-default no-boxsha">
						<div class="panel-body bg-white ">
							<h1>
								<? if($_SESSION[Language]== "Thailand"){echo "ไม่มีสินค้าในตะกร้า"; } else{echo "no items"; } ?>
							</h1>
						</div>
					</div>
				</div>
				<!-- 9 -->

				<div class="col-md-3">
					<div class="panel panel-default no-boxsha">
						<div class="panel-body bg-white ">
							<form method="get" action="portage.php">
								<div class="row">
									<div class="col-md-12 text-right">
										<h4>  <? if($_SESSION[Language]== "Thailand"){echo "จำนวน"; } else{echo "amount"; } ?> : 0  </h4>
										<h4>  <? if($_SESSION[Language]== "Thailand"){echo "ราคารวม"; } else{echo "total price"; } ?>  : 0  <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?></h4>
									</div>
									<div class="col-md-12 marginbottom15">
										<select class="form-control"  name="portage_id" required>
											<?
											$portage_SL = " SELECT * FROM portage WHERE portage_id != '$product[portage_id]' ORDER BY portage_id ASC";
											$portage_QR 	= mysqli_query($con,$portage_SL);
											while ($portage 	= mysqli_fetch_array($portage_QR)) {
												$weight_Sl 	= "SELECT * FROM weight WHERE weight_min <= '$_SESSION[order_list_weight]' AND weight_max >= '$_SESSION[order_list_weight]'  AND (portage_id = '$portage[portage_id]') ";
												$weight_RS 	= mysqli_query($con,$weight_Sl); 
												$weight 		= mysqli_fetch_array($weight_RS);
												?>
												<option value="<?php echo $portage[portage_id]; ?>"> 
													<?php echo $portage[portage_name]; ?>  (<? echo $weight[weight_price]; ?>  <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?>)
												</option>
												<?
											}
											?>
										</select>
									</div>
									<div class="col-md-12 marginbottom15">
										<select class="form-control"  name="cash_on_id" required>
											<option value=""><? if($_SESSION[Language]== "Thailand"){echo "วิธีชำระเงิน"; } else{echo "payment"; } ?></option>
											<?
											$cash_on_SL = " SELECT * FROM cash_on WHERE cash_on_id != '$product[cash_on_id]' ORDER BY cash_on_id ASC";
											$cash_on_QR 	= mysqli_query($con,$cash_on_SL);
											while ($cash_on 	= mysqli_fetch_array($cash_on_QR)) {
												?>
												<option value="<?php echo $cash_on[cash_on_id]; ?>"> 
													<?php echo $cash_on[cash_on_name]; ?>  
												</option>
												<?
											}
											?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 br">
										<a href="product.php" class="btn btn-default  btn-block"><? if($_SESSION[Language]== "Thailand"){echo "เลือกซื้อสินค้าต่อ"; } else{echo "Continue shopping"; } ?></a>
									</div>
									<div class="col-md-12">	
										<?
										if ($_SESSION[cart]=="" || !isset($_SESSION[cart]) || $_SESSION[cart]==NULL) {
											?>
											<a onclick="portage()" class="btn btn-main  btn-block ani-bounce" href="">ดำเนินการสั่งซื้อ</a>
											<script>
												function portage() {
													alert("ไม่มีสินค้าในตะกร้า");
												}
											</script>
											<?
										}
										else if (trim($_SESSION['member_online_id'])==""&&!isset($_SESSION['member_online_id'])) {
											?>
											<a href="portage_user.php" class="btn btn-main  btn-block ani-bounce" >  
												ดำเนินการสั่งซื้อ
											</a>
											<?
										}
										else{
											?>
											<input type="submit" class="btn btn-main  btn-block ani-bounce" value="ดำเนินการสั่งซื้อ">
											<?
										}
										?>
									</div>
								</div>
							</form>
						</div>
					</div>


				</div>
			</div>
			<?
		}
		?>

	</div>
	<!-- container -->
	<? include 'index_Footer.php'; ?>
</body>
</html>