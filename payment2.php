<? 
include 'index_Include.php'; 
$_SESSION['page'] = 'payment2.php';

if (isset($_GET[order_list_id])){
	$_SESSION[order_list_id] =  $_GET[order_list_id];
}
$order_list_id =   $_SESSION[order_list_id];

$order_list_SL = " SELECT * FROM order_list WHERE order_list_id = '$order_list_id' ";
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




if (isset($_POST[submit_paymet])) {

	$order_list_id 	= $order_list[order_list_id];

	$order_list_Add 		= "SELECT * FROM `order_list` WHERE order_list_id = '$order_list_id'";
	$order_list_Reult 	= mysqli_query($con,$order_list_Add);
	$order_list 			= mysqli_fetch_array($order_list_Reult);
	$order_list_Row  	= mysqli_num_rows($order_list_Reult);
	if ($order_list_Row > 0 && $order_list[order_list_status] != 4 ) {

		$payment_photo = rand().$_FILES["payment_photo"]["name"];
		if(move_uploaded_file($_FILES["payment_photo"]["tmp_name"],"cloud/payment_photo/".$payment_photo)){

			$payment_price 	= $_POST[payment_price];					
			$account_id 	= $_POST[account_id];			

			$payment_Add = "INSERT INTO `payment` (`payment_id`, `order_list_id`, `payment_price`, `payment_date`, `payment_time`, `payment_photo`,`payment_now`,`account_id`) VALUES (NULL, '$order_list[order_list_id]', '$payment_price',NOW(), NOW(),'$payment_photo',NOW(), '$account_id')";
			$payment_Reult = mysqli_query($con,$payment_Add);

			$_SESSION[payment_id] = mysqli_insert_id($con);

			if (!$payment_Reult) {
				echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
			}
			if ($payment_Reult) {

				$order_list_Update = "UPDATE `order_list` SET `order_list_status` = '2' WHERE order_list_id = '$order_list_id'";
				$order_list_Reult = mysqli_query($con,$order_list_Update);

				$order_list_SL = " SELECT * FROM order_list WHERE order_list_id = '$order_list_id'";
				$order_list_QR = mysqli_query($con,$order_list_SL);
				$order_list 	= mysqli_fetch_array($order_list_QR);

				$_SESSION[order_list_id] = $order_list_id;

				$order_list_status_SL = " SELECT * FROM order_list_status WHERE order_list_status_id = '$order_list[order_list_status]' ";
				$order_list_status_QR 	= mysqli_query($con,$order_list_status_SL);
				$order_list_status 	= mysqli_fetch_array($order_list_status_QR);

				$payment_SL = " SELECT * FROM payment WHERE payment_id = '$_SESSION[payment_id]'";
				$payment_QR = mysqli_query($con,$payment_SL);
				$payment 	= mysqli_fetch_array($payment_QR);

				$account_SL 	= " SELECT * FROM account WHERE account_id = '$payment[account_id]'";
				$account_QR 	= mysqli_query($con,$account_SL);
				$account 	= mysqli_fetch_array($account_QR);	

				$strTo = $fixed[fixed_inbox];
				$strSubject = " แจ้งโอนเงิน - (".$order_list[order_list_id].") ".$fixed[fixed_website];
				$strHeader = "Content-type: text/html; charset=utf-8\n";
				$strHeader .= "From: ".$fixed[fixed_sent]."\n";
				$strMessage = "";
				$strMessage .= "<h3> มีการแจ้งโอนเงิน </h3>";
				$strMessage .= "<h3>  เลขใบสั่งซื้อ : ".$order_list[order_list_id]." </h3>";
				$strMessage .= "<p> วัน เวลา การแจ้ง : ".displaydate($payment[payment_date])."  ".$payment[payment_time]." </p>";
				$strMessage .= "<p> บัญชีธนาคาร : ".$account[account_bank]." </p>";
				$strMessage .= "<p> เลขบัญชี : ".$account[account_number]." </p>";
				$strMessage .= "<p> ชื่อบัญชี : ".$account[account_name]." </p>";
				$strMessage .= "<p> <img width='300' src='http://".$fixed[fixed_website]."/cloud/payment_photo/".$payment[payment_photo]."'>  </p> ";
				$strMessage .= "<h3> ยอดที่ต้องชำระ กรุณาเช็คให้ตรงกัน : ".number_format($order_list[order_list_price])." บาท </h3>";
				$strMessage .= "<h3> ลิ้งตรวจสอบ และอัพเดทสถานะ : <a target='_blank'  href='http://".$fixed[fixed_website]."/admin/payment_one.php?payment_id=".$payment[payment_id]."'> คลิก </a></h3>";
				$strMessage .= "<br>";
				$strMessage .= "<p>  ผู้ซื้อ : ".$order_list[order_list_member_name]."  </p>";
				$strMessage .= "<p>  อีเมล : ".$order_list[order_list_member_email]."  </p>";
				$strMessage .= "<p>  เบอร์ติดต่อ : ".$order_list[order_list_member_phone]."  </p>";
				$strMessage .= "<p>  ที่อยู่จัดส่ง : ".$order_list[order_list_member_address]."  </p>";
				$strMessage .= "<p>  รหัสไปรษณีย์ : ".$order_list[order_list_member_zipcode]."  </p>";
				$strMessage .= "<p>  วันเวลาที่สั่งซื้อ : ".displaydate($order_list[order_list_date])."  ".$order_list[order_list_time]."  </p>";
				$strMessage .= "<p><b> ".$fixed[fixed_website]." </b> <p>";
				$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
				echo"<script> alert('แจ้งชำระเงินเรียบร้อยแล้ว ทางเราจะทำการตรวจสอบ'); window.location='search_numbers.php'; </script>";
			}
		}	
	}
	
	else{

		echo"<script>alert('ไม่มีเลขใบสั่งซื้อนี้ หรือถูกยกเลิกไปแล้ว'); window.history.back(); </script>";
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	
	<link rel="canonical" href="https://<? echo $fixed[fixed_website]; ?>" >
	<title> <? if($_SESSION[Language]== "Thailand"){echo "ชำระเงินเลขใบสั่งซื้อ"; } else{echo "pay order number"; } ?>  <? echo $order_list[order_list_id]; ?> | <? echo $fixed[fixed_website]; ?> </title>
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
					<? if($_SESSION[Language]== "Thailand"){echo "ชำระเงินเลขใบสั่งซื้อ"; } else{echo "pay order number"; } ?>
					<? echo $order_list[order_list_id]; ?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default no-boxsha radius20" style="overflow: hidden;">
					<div class="panel-body bg-white ">
						<p class="size24 bold text1">
							<? if($_SESSION[Language]== "Thailand"){echo "สถานะ"; } else{echo "status"; } ?> : <? include 'index_order_list_status.php'; ?>
						</p>
					</div>
				</div>
				<div class="panel panel-default no-boxsha radius20" style="overflow: hidden;" >
					<div class="panel-body bg-white ">
						<div class="row">
							<div class="col-md-12">
								<p class="size24 bold text1">
									<? if($_SESSION[Language]== "Thailand"){echo "ชำระเงินโดยการโอนเงินไปที่"; } else{echo "Pay by transferring money to"; } ?>
								</p>
							</div>

							<?
							$account_SL = " SELECT * FROM account  ORDER BY account_id ASC";
							$account_QR 	= mysqli_query($con,$account_SL);
							$account_Row 	= mysqli_num_rows($account_QR);
							$i=1;
							while ($account 	= mysqli_fetch_array($account_QR)) {
								?>
								<div class="col-xs-12 size18">
									<p>
										<span class="bold text1"><? if($_SESSION[Language]== "Thailand"){echo "ธนาคาร"; } else{echo "Bank"; } ?> : </span><?php echo $account[account_bank]; ?>
									</p>
									<p>
										<span class="bold text1"><? if($_SESSION[Language]== "Thailand"){echo "เลขบัญชี"; } else{echo "account number"; } ?> : </span><?php echo $account[account_number]; ?>
									</p>
									<p>
										<span class="bold text1"><? if($_SESSION[Language]== "Thailand"){echo "ชื่อบัญชี"; } else{echo "account name"; } ?> : </span><?php echo $account[account_name]; ?>
									</p>
								</div>
								<?
								if (isset($account[account_photo])&&trim($account[account_photo])!='') {
									?>
									<img class="full" style="cursor: zoom-in;max-width: 300px;" id="account_photo<?php echo $account[account_id]; ?>" src="cloud/account_photo/<?php echo $account[account_photo]; ?>"  />
									<div id="account_photo_mymodal<?php echo $account[account_id]; ?>" class="w3-modal">
										<span class="zoom-close close_account_photo<?php echo $account[account_id]; ?>">&times;</span>
										<img style="width: 350px;" class="w3-modal-content close_account_photo<?php echo $account[account_id]; ?>" id="account_photo_img<?php echo $account[account_id]; ?>">
									</div>
									<script>
										var w3modal = document.getElementById("account_photo_mymodal<?php echo $account[account_id]; ?>");
										var img = document.getElementById("account_photo<?php echo $account[account_id]; ?>");
										var modalImg = document.getElementById("account_photo_img<?php echo $account[account_id]; ?>");
										img.onclick = function(){
											w3modal.style.display = "block";
											modalImg.src = this.src;
										}
										var span = document.getElementsByClassName("close_account_photo<?php echo $account[account_id]; ?>")[0];
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
								<div class="col-xs-12">
									<?
									if ($account_Row!=$i) {
										?>
										<hr >
										<?
									}
									?>

								</div>
								<?php
								$i++;
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel-set01 marginbottom15">
					<div class="panel panel-default  no-boxsha radius20" style="overflow: hidden;">
						<div class="panel-body bg-white  ">
							<div class="row">
								<div class="col-md-12 resize">
									<p class="size24 bold text1">
										<? if($_SESSION[Language]== "Thailand"){echo "ใบสั่งซื้อ"; } else{echo "Order number"; } ?> : <? echo $order_list[order_list_id]; ?>
									</p>
								</div>
							</div>
							<form action="" method="post" enctype="multipart/form-data">
								<div class="form-group resize">
									<p class="size24 bold text1">  <? if($_SESSION[Language]== "Thailand"){echo "ยอดชำระเงินทั้งหมด"; } else{echo "total payment"; } ?> : <?php echo number_format($order_list[order_list_price]); ?> บาท</p>
								</div>
								<div class="form-group">
									<label class="control-label"><? if($_SESSION[Language]== "Thailand"){echo "เลขบัญชีปลายทาง"; } else{echo "Bank"; } ?> </label>
									<select class="form-control"  name="account_id" required>
										<option value=""><? if($_SESSION[Language]== "Thailand"){echo "เลขบัญชีปลายทาง"; } else{echo "Bank"; } ?></option>
										<?
										$account_SL = " SELECT * FROM account WHERE account_id != '$product[account_id]' ORDER BY account_id ASC";
										$account_QR 	= mysqli_query($con,$account_SL);
										while ($account 	= mysqli_fetch_array($account_QR)) {
											?>
											<option value="<?php echo $account[account_id]; ?>"><?php echo $account[account_bank]; ?> / <?php echo $account[account_number]; ?> / <?php echo $account[account_name]; ?> </option>
											<?
										}
										?>

									</select>
								</div>
								<div class="form-group">
									<label class="control-label"> <? if($_SESSION[Language]== "Thailand"){echo "หลักฐานการโอนเงิน"; } else{echo "Proof of transfer"; } ?> </label>
									<input required  name="payment_photo" type="file" class="form-control">
								</div>
								<button type="submit" class="btn btn-main text1 ani-bounce boxsha btn-block "><? if($_SESSION[Language]== "Thailand"){echo "แจ้งโอนเงิน"; } else{echo "submit"; } ?></button>
								<input type="hidden" name="submit_paymet" >
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?
		if (trim($_SESSION['member_online_id'])!=''&&isset($_SESSION['member_online_id'])) {
			?>
			<a href="my_order.php" class="btn btn-default boxsha margintop15">
				<i class="material-icons size15">arrow_back</i>  <? if($_SESSION[Language]== "Thailand"){echo "หน้ารายการสั่งซื้อ"; } else{echo "back"; } ?>
			</a>
			<?
		}
		?>
	</div>
	<? include 'index_Footer.php'; ?>
</body>
</html>