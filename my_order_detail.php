		<? 
		include 'index_Include.php'; 
		$_SESSION['page'] = 'my_order_detail.php';
		if (isset($_GET[order_list_id])){
			$_SESSION[order_list_id] =  $_GET[order_list_id];
		}
		$order_list_id =   $_SESSION[order_list_id] ;
		$order_list_SL = " SELECT * FROM order_list WHERE order_list_id = '$order_list_id'";
		$order_list_QR = mysqli_query($con,$order_list_SL);
		$order_list 	= mysqli_fetch_array($order_list_QR);
		$member_SL = " SELECT * FROM member WHERE member_id = '$order_list[order_list_member_id]'";
		$member_QR = mysqli_query($con,$member_SL);
		$member 	= mysqli_fetch_array($member_QR);
		$order_list_who_SL 	= " SELECT * FROM order_list_who WHERE order_list_who_id = '$order_list[order_list_who_id]'";
		$order_list_who_QR 	= mysqli_query($con,$order_list_who_SL);
		$order_list_who 	= mysqli_fetch_array($order_list_who_QR);		
		$order_list_status_SL = " SELECT * FROM order_list_status WHERE order_list_status_id = '$order_list[order_list_status]' ";
		$order_list_status_QR 	= mysqli_query($con,$order_list_status_SL);
		$order_list_status 	= mysqli_fetch_array($order_list_status_QR);
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<link rel="canonical" href="https://<? echo $fixed[fixed_website]; ?>" >
			<title>  <? if($_SESSION[Language]== "Thailand"){echo "ใบสั่งซื้อ"; } else{echo "Order number"; } ?>   <? echo $order_list[order_list_id]; ?> | <? echo $fixed[fixed_website]; ?> </title>
			<meta name="description" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>) ">
			<meta name="keywords" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
			<meta name="author" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
			<? include 'index_Head.php'; ?>
		</head>
		<body>
			<? include 'index_Navber.php'; ?>
			<div class="container paddingbottom45">
				<div class="row margintop30">
					<div class="col-md-12 resize">
						<p class="pagetopic ">
							 <? if($_SESSION[Language]== "Thailand"){echo "ใบสั่งซื้อ"; } else{echo "Order number"; } ?>   <? echo $order_list[order_list_id]; ?> ( <? echo number_format($order_list[order_list_price]); ?>  บาท )
						</p>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default  no-boxsha" style="overflow: hidden;">
							<div class="panel-body bg-white ">
								<form class="form-horizontal text1" method="post" style="padding: 10px;">
									<div class="form-group">
										<label class="control-label col-md-5" >  <? if($_SESSION[Language]== "Thailand"){echo "สถานะ"; } else{echo "status"; } ?>  </label>
										<label class="control-label col-md-7 text-left">
											<? include 'index_order_list_status.php'; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5" >   <? if($_SESSION[Language]== "Thailand"){echo "วิธีการชำระเงิน"; } else{echo "Payment method"; } ?>   </label>
										<label class="control-label col-md-7 text-left">
											<? echo $order_list[order_list_cash_on_name]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5" >  <? if($_SESSION[Language]== "Thailand"){echo "เลขใบสั่งซื้อ"; } else{echo "Order number"; } ?> </label>
										<label class="control-label col-md-7 text-left">
											<? echo $order_list[order_list_id]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5" > <? if($_SESSION[Language]== "Thailand"){echo "ระดับ"; } else{echo "level"; } ?></label>
										<label class="control-label col-md-7 text-left">
											<? echo $order_list_who[order_list_who_name]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5" > <? if($_SESSION[Language]== "Thailand"){echo "จำนวนสินค้า"; } else{echo "Number of products"; } ?></label>
										<label class="control-label col-md-7 text-left">
											<? echo $order_list[order_list_amount]; ?> 
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5" >  <? if($_SESSION[Language]== "Thailand"){echo "น้ำหนัก"; } else{echo "weight"; } ?> </label>
										<label class="control-label col-md-7 text-left">
											<? echo number_format($order_list[order_list_weight]); ?> กรัม   (<? echo $order_list[order_list_weight]/1000; ?> <? if($_SESSION[Language]== "Thailand"){echo "กิโลกรัม"; } else{echo "kg"; } ?> ) 
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5" > <? if($_SESSION[Language]== "Thailand"){echo "เลขพัสดุ"; } else{echo "tracking number"; } ?></label>
										<label class="control-label col-md-7 text-left">
											<? echo $order_list[order_list_package]; ?> 
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5" >   <? if($_SESSION[Language]== "Thailand"){echo "การจัดส่ง"; } else{echo "delivery"; } ?>    </label>
										<label class="control-label col-md-7 text-left">
											<? echo $order_list[order_list_p_name]; ?>  <br> ( <? echo $order_list[order_list_p_price]; ?> <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?> ) <a  href="http://<? echo $order_list[order_list_p_link]; ?>" target="_blank">
											  <? if($_SESSION[Language]== "Thailand"){echo "ติดตามพัสดุ"; } else{echo "tracking"; } ?>
											  </a>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5" > <? if($_SESSION[Language]== "Thailand"){echo "ราคาสินค้า"; } else{echo "product price"; } ?></label>
										<label class="control-label col-md-7 text-left">
											<? echo number_format($order_list[order_list_product]); ?> <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?> 
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5" >  <? if($_SESSION[Language]== "Thailand"){echo "ยอดชำระเงินทั้งหมด"; } else{echo "total payment"; } ?></label>
										<label class="control-label col-md-7 text-left text-red" >
											<b>
												<? echo number_format($order_list[order_list_price]); ?> <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?> 
											</b>
										</label>
									</div>
								</form>
							</div>
						</div>
						<div class="panel panel-default  no-boxsha" style="overflow: hidden;">
							<div class="panel-body bg-white ">
								<form class="form-horizontal text1" method="post" style="padding: 10px;">
									<div class="form-group">
										<label class="control-label col-md-5" ><? if($_SESSION[Language]== "Thailand"){echo "ชื่อ - นามสกุล"; } else{echo "full name"; } ?></label>
										<label class="control-label col-md-7 text-left">
											<? echo $order_list[order_list_member_name]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5" ><? if($_SESSION[Language]== "Thailand"){echo "อีเมล"; } else{echo "email"; } ?>  </label>
										<label class="control-label col-md-7 text-left">
											<? echo $order_list[order_list_member_email]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5" ><? if($_SESSION[Language]== "Thailand"){echo "เบอร์โทร"; } else{echo "phone"; } ?>  </label>
										<label class="control-label col-md-7 text-left">
											<? echo $order_list[order_list_member_phone]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5" ><? if($_SESSION[Language]== "Thailand"){echo "ที่อยู่จัดส่ง"; } else{echo "address"; } ?>  </label>
										<label class="control-label col-md-7 text-left">
											<? echo $order_list[order_list_member_address]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5" > <? if($_SESSION[Language]== "Thailand"){echo "รหัสไปรษณีย์"; } else{echo "zipcode"; } ?>  </label>
										<label class="control-label col-md-7 text-left">
											<? echo $order_list[order_list_member_zipcode]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5" >  <? if($_SESSION[Language]== "Thailand"){echo "เวลาสั่งซื้อ"; } else{echo "date"; } ?>  </label>
										<label class="control-label col-md-7 text-left">
											<?php echo displaydate($order_list[order_list_date])."  ".$order_list[order_list_time]; ?>
										</label>
									</div>
								</form>
							</div>
						</div>
						
					</div>
					<div class="col-md-6">

						<?php
						$or_product_SL = " SELECT * FROM or_product WHERE order_list_id = '$order_list[order_list_id]'";
						$or_product_QR 	= mysqli_query($con,$or_product_SL);
						$i=1;
						while ($or_product 	= mysqli_fetch_array($or_product_QR)) {

							$product_Sl = "SELECT * FROM product WHERE product_id = '$or_product[product_id]'";
							$product_Qr = mysqli_query($con,$product_Sl);
							$product = mysqli_fetch_array($product_Qr);

							$product_Sl = "SELECT * FROM product WHERE product_id = '$product[product_id]'";
							$product_Qr = mysqli_query($con,$product_Sl);
							$product = mysqli_fetch_array($product_Qr);


							?>
							<div class="panel panel-default  no-boxsha" style="overflow: hidden;">
								<div class="panel-body bg-white ">
									<div class="row top-margin2 text1 ">
										<div class="col-xs-3">
											<p>
												<img  src="cloud/product_photo/<?php echo $product[product_photo]; ?>" class="full" />	
											</p>
										</div>
										<div class="col-xs-9">
											<p>
												<span class="bold">   <? if($_SESSION[Language]== "Thailand"){echo "สินค้า"; } else{echo "product"; } ?>    : </span><?if($_SESSION[Language]== "Thailand"){	echo $product[product_name]; } else if($product[product_name_eng]!=''){	echo $product[product_name_eng];  }else{	echo $product[product_name];}?> 
											</p>
										</p>
										<p>
											<span class="bold">   <? if($_SESSION[Language]== "Thailand"){echo "ราคา"; } else{echo "price"; } ?>   : </span>
											<?
											echo number_format($product[product_price]);
											?>

										</p>
										<p>
											<span class="bold"><? if($_SESSION[Language]== "Thailand"){echo "จำนวน"; } else{echo "amount"; } ?> : </span><?php echo $or_product[product_amount];?>
										</p>
									</div>
								</div>
							</div>
						</div>
						<!-- row visible -->
						<?php
						$i++;
					}
					?>
					<div class="panel panel-default  no-boxsha" style="overflow: hidden;">
						<div class="panel-body bg-white ">
							<div class="row">
								<div class="col-md-12 text-right text1">
									<h4> <? if($_SESSION[Language]== "Thailand"){echo "จำนวน"; } else{echo "amount"; } ?> :  <? echo $order_list[order_list_amount]; ?>  </h4>
									<h4>   <? if($_SESSION[Language]== "Thailand"){echo "น้ำหนัก"; } else{echo "weight"; } ?> 
									 : <?php echo number_format($order_list[order_list_weight]); ?> 
									   <? if($_SESSION[Language]== "Thailand"){echo "กรัม"; } else{echo "g."; } ?> 
									  (<? echo $order_list[order_list_weight]/1000; ?>
									    <? if($_SESSION[Language]== "Thailand"){echo "กิโลกรัม"; } else{echo "kg."; } ?> 
									    )  </h4>
									<h4> <? if($_SESSION[Language]== "Thailand"){echo "ราคารวม"; } else{echo "total price"; } ?>  : <?php echo number_format($order_list[order_list_product]); ?> <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?></h4>
									<h4> <? if($_SESSION[Language]== "Thailand"){echo "ค่าจัดส่ง"; } else{echo "shipping cost"; } ?> :  <?php echo number_format($order_list[order_list_p_price]); ?> <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?></h4>
									<h4 class="bold">   <? if($_SESSION[Language]== "Thailand"){echo "ยอดชำระเงินทั้งหมด"; } else{echo "total payment"; } ?> : <?php echo number_format($order_list[order_list_price]); ?> <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?></h4>
								</div>
							</div>
						</div>
					</div>
					

					<?
					if ($order_list[order_list_status]==1) {
						?>
						<a href="payment2.php?order_list_id=<?php echo $order_list[order_list_id]; ?>" class="btn text1 btn-main boxsha btn-block"> 
							<? if($_SESSION[Language]== "Thailand"){echo "ชำระเงิน , แจ้งโอนเงิน"; } else{echo "payment, transfer"; } ?>
						</a>
						<a data-toggle="modal" data-target="#modal_order_list_update<?php echo $order_list[order_list_id]; ?>" class="btn text1 btn-default  btn-block">
							<? if($_SESSION[Language]== "Thailand"){echo "ยกเลิกการสั่งซื้อ"; } else{echo "cancel order"; } ?>
						</a>

						<div id="modal_order_list_update<?php echo $order_list[order_list_id]; ?>" class="modal fade" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content modal-sm">
									<form action="" method="post">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title"><? if($_SESSION[Language]== "Thailand"){echo "ยกเลิกการสั่งซื้อ"; } else{echo "cancel order"; } ?></h4>
										</div>
										<div class="modal-body text1">
											<div class="row">
												<div class="col-xs-6">
													<button type="submit" class="btn text1 btn-default btn-danger">
														<? if($_SESSION[Language]== "Thailand"){echo "ยกเลิกการสั่งซื้อ"; } else{echo "cancel order"; } ?>
													</button>
												</div>
												<div class="col-xs-6">
													<button type="button" class="btn text1 btn-default btn-block" data-dismiss="modal"><? if($_SESSION[Language]== "Thailand"){echo "ออก"; } else{echo "close"; } ?></button>
												</div>
											</div>
											<input Type="hidden" name="modal_order_list_update" value="x">
											<input Type="hidden" name="order_list_id" value="<?php echo $order_list[order_list_id]; ?>">
										</div>
									</form>
								</div>
							</div>
						</div>


						<?
					}
					?>


				</div>
			</div>
			<a href="my_order.php" class="btn btn-default boxsha margintop15">
				<i class="material-icons size13">arrow_back</i> <? if($_SESSION[Language]== "Thailand"){echo "หน้ารายการสั่งซื้อ"; } else{echo "back"; } ?>
			</a>
		</div>
		<? include 'index_Footer.php'; ?>
	</body>
	</html>