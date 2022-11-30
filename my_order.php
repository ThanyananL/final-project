<? 
include 'index_Include.php'; 
$_SESSION['page'] = 'my_order.php';

if ($_POST['modal_order_list_update']) {

	$order_list_id 	= $_POST['order_list_id'];
	$_SESSION[order_list_id] 	= $_POST['order_list_id'];
	$order_list_status = 4;

	$order_list_Update 	= "UPDATE `order_list` SET `order_list_status` = '$order_list_status' WHERE `order_list_id` = '$order_list_id'";
	$order_list_Reult 	= mysqli_query($con,$order_list_Update);

	if ($order_list_Reult) {

		$or_product_SL = " SELECT * FROM or_product WHERE order_list_id = '$_SESSION[order_list_id]' ";
		$or_product_QR 	= mysqli_query($con,$or_product_SL);
		while ($or_product 	= mysqli_fetch_array($or_product_QR)) {

			$product_SL = " SELECT * FROM product WHERE product_id = '$or_product[product_id]'";
			$product_QR 	= mysqli_query($con,$product_SL);
			$product 	= mysqli_fetch_array($product_QR);

			$product_amount = $or_product[product_amount]+$product[product_amount];

			$product_Update = "UPDATE `product` SET `product_amount` = '$product_amount'  WHERE `product_id` = '$or_product[product_id]'";
			$product_Reult = mysqli_query($con,$product_Update);
		}


		echo"<script>alert('ยกเลิกการสั่งซื้อเรียบร้อยแล้ว'); window.location='my_order.php';</script>";
	}
	else {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="canonical" href="https://<? echo $fixed[fixed_website]; ?>" >
	<title> <? if($_SESSION[Language]== "Thailand"){echo "รายการสั่งซื้อ"; } else{echo "My Order"; } ?> <? echo $fixed[fixed_company]; ?> - <? echo $fixed[fixed_topic]; ?> | <? echo $fixed[fixed_website]; ?> </title>
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
				<p class="pagetopic ">
					<? if($_SESSION[Language]== "Thailand"){echo "รายการสั่งซื้อ"; } else{echo "My Order"; } ?>
				</p>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row ">
					<?
					$order_list_SL = " SELECT * FROM order_list WHERE order_list_member_id = '$_SESSION[member_online_id]' and  order_list_status !='5'  Order By order_list_id DESC ";
					$order_list_QR 	= mysqli_query($con,$order_list_SL);
					$order_list_ROW = mysqli_fetch_array($order_list_QR);
					if ($order_list_ROW==0) {
						?>
						<div class="col-lg-12">
							<h4 class="bold">
								<? if($_SESSION[Language]== "Thailand"){echo "คุณไม่มีรายการสั่งซื้อ"; } else{echo "not have an order"; } ?>
							</h4>	
						</div>
						<?
					}
					?>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?
						$order_list_QR 	= mysqli_query($con,$order_list_SL);
						$i=1;
						while ($order_list 	= mysqli_fetch_array($order_list_QR)) {
							?>
							<div class="panel panel-default no-boxsha" style="overflow: hidden;">
								<div class="panel-body bg-white ">
									<div class="row text1">
										<div class="col-md-2" style="padding: 5px;">
											<div class="bold size13"> <? if($_SESSION[Language]== "Thailand"){echo "ใบสั่งซื้อ"; } else{echo "Order number"; } ?> </div>
											<div class="size13">
												<?php echo $order_list[order_list_id]; ?> 
											</div>
										</div>
										<div class="col-md-1" style="padding: 5px;">
											<div class="bold size13">  <? if($_SESSION[Language]== "Thailand"){echo "สถานะ"; } else{echo "status"; } ?>  </div>
											<div class="size13">
												<? include 'index_order_list_status.php'; ?>
											</div>
										</div>
										<div class="col-md-2" style="padding: 5px;">
											<div class="bold size13"> <? if($_SESSION[Language]== "Thailand"){echo "ยอดชำระเงินทั้งหมด"; } else{echo "total payment"; } ?> </div>
											<div class="size13">
												<?echo number_format($order_list[order_list_price]);?> <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?> 
											</div>
										</div>
										<div class="col-md-3" style="padding: 5px;">
											<div class="bold size13">  <? if($_SESSION[Language]== "Thailand"){echo "เวลาสั่งซื้อ"; } else{echo "date"; } ?>  </div>
											<div class="size13">
												<?php echo displaydate($order_list[order_list_date])."  ".$order_list[order_list_time]; ?>
											</div>
										</div>
										<div class="col-md-4" style="padding: 5px;">
											<a href="my_order_detail.php?order_list_id=<?php echo $order_list[order_list_id]; ?>" class="btn btn-default btn-sm" style="margin-bottom: 5px;font-size: 10px;padding 3px;" >
												<? if($_SESSION[Language]== "Thailand"){echo "รายละเอียด"; } else{echo "Detail"; } ?>
											</a>
											<a target="_blank" href="my_order_pdf.php?order_list_id=<?php echo $order_list[order_list_id]; ?>" class="btn btn-default btn-sm" style="margin-bottom: 5px;font-size: 10px;padding 3px;" >
												<? if($_SESSION[Language]== "Thailand"){echo "ดูใบเสร็จ"; } else{echo "receipt"; } ?>
											</a>
											<?
											if ($order_list[order_list_status]==1) {
												?>
												<a href="payment2.php?order_list_id=<?php echo $order_list[order_list_id]; ?>" class="btn btn-default  btn-sm" style="margin-bottom: 5px;font-size: 10px;padding 3px;" >
													<? if($_SESSION[Language]== "Thailand"){echo "ชำระเงิน , แจ้งโอนเงิน"; } else{echo "payment, transfer"; } ?>
												</a>
												<a data-toggle="modal" data-target="#modal_order_list_update<?php echo $order_list[order_list_id]; ?>" class="btn btn-default btn-sm" style="margin-bottom: 5px;font-size: 10px;padding 3px;" >
													<? if($_SESSION[Language]== "Thailand"){echo "ยกเลิกการสั่งซื้อ"; } else{echo "cancel order"; } ?>
												</a>

												<div id="modal_order_list_update<?php echo $order_list[order_list_id]; ?>" class="modal fade" role="dialog">
													<div class="modal-dialog" role="document">
														<div class="modal-content modal-sm">
															<form action="" method="post">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title"> <? if($_SESSION[Language]== "Thailand"){echo "ยกเลิกการสั่งซื้อ"; } else{echo "cancel order"; } ?></h4>
																</div>
																<div class="modal-body">
																	<div class="row">
																		<div class="col-xs-6">
																			<button type="submit" class="btn btn-default btn-danger">
																				<? if($_SESSION[Language]== "Thailand"){echo "ยกเลิกการสั่งซื้อ"; } else{echo "cancel order"; } ?>
																			</button>
																		</div>
																		<div class="col-xs-6">
																			<button type="button" class="btn btn-default btn-block" data-dismiss="modal"> <? if($_SESSION[Language]== "Thailand"){echo "ออก"; } else{echo "close"; } ?></button>
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
								</div>
							</div>
							<?php
							$i++;
						}
						?>
					</div>
				</div>

			</div>	
		</div>
	</div>
	<? include 'index_Footer.php'; ?>
</body>
</html>