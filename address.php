<?
include 'index_Include.php'; 
$_SESSION['page'] = 'portage.php';

$portage_SL = " SELECT * FROM portage WHERE portage_id != '$product[portage_id]' ORDER BY portage_id ASC";
$portage_QR 	= mysqli_query($con,$portage_SL);
while ($portage 	= mysqli_fetch_array($portage_QR)) {
	$weight_Sl 	= "SELECT * FROM weight WHERE weight_min <= '$_SESSION[order_list_weight]' AND weight_max >= '$_SESSION[order_list_weight]'  AND (portage_id = '$portage[portage_id]') ";
	$weight_RS 	= mysqli_query($con,$weight_Sl); 
	$weight 		= mysqli_fetch_array($weight_RS);
	$portage_id = $portage[portage_id];
	$_SESSION[portage_id] = $portage[portage_id];
}

$cash_on_SL = " SELECT * FROM cash_on WHERE cash_on_id != '$product[cash_on_id]' ORDER BY cash_on_id ASC";
$cash_on_QR 	= mysqli_query($con,$cash_on_SL);
while ($cash_on 	= mysqli_fetch_array($cash_on_QR)) {
	$cash_on_id = $cash_on[cash_on_id];
	$_SESSION[cash_on_id] = $cash_on[cash_on_id];
}

$portage_SL = " SELECT * FROM portage WHERE portage_id = '$portage_id'";
$portage_QR = mysqli_query($con,$portage_SL);
$portage 	= mysqli_fetch_array($portage_QR);

$weight_Sl 	= "SELECT * FROM weight WHERE weight_min <= '$_SESSION[order_list_weight]' AND weight_max >= '$_SESSION[order_list_weight]'  AND (portage_id = '$portage[portage_id]') ";
$weight_RS 	= mysqli_query($con,$weight_Sl); 
$weight 		= mysqli_fetch_array($weight_RS);

$cash_on_SL = " SELECT * FROM cash_on WHERE cash_on_id = '$cash_on_id'";
$cash_on_QR = mysqli_query($con,$cash_on_SL);
$cash_on 	= mysqli_fetch_array($cash_on_QR);

if (isset($_POST[submit_order])) {

	$portage_SL 		= " SELECT * FROM portage WHERE portage_id = '$_SESSION[portage_id];'";
	$portage_QR 		= mysqli_query($con,$portage_SL);
	$portage_submit 	= mysqli_fetch_array($portage_QR);
	
	$order_list_p_name 	=	 $portage_submit['portage_name'];
	$order_list_p_link 	=	 $portage_submit['portage_link'];

	$cash_on_SL 		= " SELECT * FROM cash_on WHERE cash_on_id = '$_SESSION[cash_on_id];'";
	$cash_on_QR 		= mysqli_query($con,$cash_on_SL);
	$cash_on_submit 	= mysqli_fetch_array($cash_on_QR);

	$order_list_cash_on_name 	=	 $cash_on_submit['cash_on_name'];

	$order_list_status = 1;
	if ($cash_on_submit['cash_on_id']==2) {
		$order_list_status=6;
	}
	

	$order_list_Add = "INSERT INTO `order_list` (`order_list_id`, `order_list_price`, `order_list_product`, `order_list_p_price`, `order_list_amount`, `order_list_time`, `order_list_date`, `order_list_status`, `order_list_package`, `order_list_weight`, `order_list_member_name`, `order_list_member_email`, `order_list_member_address`, `order_list_member_zipcode`, `order_list_member_phone`, `order_list_p_name`,`order_list_p_link`, `order_list_who_id`, `order_list_cash_on_name`, `notification_id`) 
	VALUES (NULL,'$_SESSION[order_list_price]', '$_SESSION[total]', '$_SESSION[weight_price]', '$_SESSION[amount]', NOW(), NOW(), '$order_list_status', 'รอการจัดส่ง', '$_SESSION[order_list_weight]','$_POST[member_name]', '$_POST[member_email]', '$_POST[member_address]', '$_POST[member_zipcode]', '$_POST[member_phone]', '$order_list_p_name','$order_list_p_link', '2', '$order_list_cash_on_name', '1');";

	$order_list_Reult = mysqli_query($con,$order_list_Add);
	$order_list_id = mysqli_insert_id($con);
	$_SESSION[order_list_id] = mysqli_insert_id($con);

	if (!$order_list_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	
	if ($order_list_Reult) {

		if(isset($_SESSION[cart])){
			foreach($_SESSION[cart] as $product_id=>$product_amount){
				
				$or_product_Add = "INSERT INTO `or_product` (`order_list_id`,`product_id`,`product_amount`) 
				VALUES ('$order_list_id','$product_id','$product_amount')";
				$or_product_Reult = mysqli_query($con,$or_product_Add);

				$product_SL = " SELECT * FROM product WHERE product_id = '$product_id'";
				$product_QR 	= mysqli_query($con,$product_SL);
				$product = mysqli_fetch_array($product_QR);
				
				$product_amount = $product[product_amount] - $product_amount;
				$product_Update = "UPDATE `product` SET `product_amount` = '$product_amount'  WHERE `product_id` = '$product_id'";
				$product_Reult = mysqli_query($con,$product_Update);
			}
		}

		unset($_SESSION[cart]);

		$order_list_SL = " SELECT * FROM order_list WHERE order_list_id = '$_SESSION[order_list_id]'";
		$order_list_QR 	= mysqli_query($con,$order_list_SL);
		$order_list = mysqli_fetch_array($order_list_QR);


		// ---------------- invoice 

		$order_list_id 	= $_SESSION['order_list_id'];

		$order_list_SL = " SELECT * FROM order_list WHERE order_list_id = '$order_list_id '";
		$order_list_QR 	= mysqli_query($con,$order_list_SL);
		$order_list = mysqli_fetch_array($order_list_QR);

		$order_list_status_SL = " SELECT * FROM order_list_status WHERE order_list_status_id = '$order_list[order_list_status]' ";
		$order_list_status_QR 	= mysqli_query($con,$order_list_status_SL);
		$order_list_status 	= mysqli_fetch_array($order_list_status_QR);


		$invoice = 'invoice-'.$order_list[order_list_id];

		require('admin/fpdf_mc_table.php');
		define('admin/FPDF_FONTPATH','font/');

		$pdf=new PDF_MC_Table();
		$pdf->AddPage();

		$pdf->AddFont('angsab','','angsab.php');
		$pdf->AddFont('angsa','','angsa.php');


		$pdf->SetFont('angsab','',27);
		$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ใบสั่งซื้อ'),0,10,'C');


		$pdf->SetFont('angsa','',16);
		$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','เลขที่ '.$order_list[order_list_id].'   วันที่ : '.displaydate($order_list[order_list_date])),0,10,'C');



		$pdf->SetFont('angsa','',13);
		$pdf->Cell(0,10,'',0,10, 'R');
		$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620',$fixed[fixed_address01]),0,10, 'R');
		$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620',$fixed[fixed_address02]),0,10, 'R');
		$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620',$fixed[fixed_address03]),0,10, 'R');

		$pdf->SetFont('angsa','',16);
		$pdf->Cell(0,10,'',0,10, 'R');
		$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','นามลูกค้า : '.$order_list[order_list_member_name]),0,10);
		$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','ที่อยู่ : '.$order_list[order_list_member_address].'  รหัสไปรษณีย์ : '.$order_list[order_list_member_zipcode]),0,10);
		$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','เบอร์มือถือ : '.$order_list[order_list_member_phone].'  อีเมล์ : '.$order_list[order_list_member_email]),0,10);


		$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','สถานะ : '),0,10);
		$pdf->SetTextColor(100,149,237);
		$pdf->Cell(0,-8,iconv( 'UTF-8','TIS-620','               '.$order_list_status[order_list_status_name]),0,10);
		$pdf->SetTextColor(0,0,0);

		$pdf->Cell(0,8,'',0,10, 'R');

		$payment_SL = " SELECT * FROM payment WHERE order_list_id = '$order_list[order_list_id]'";
		$payment_QR = mysqli_query($con,$payment_SL);
		$payment_row 	= mysqli_num_rows($payment_QR);
		if ($payment_row>0) {

			$payment 	= mysqli_fetch_array($payment_QR);

			$account_SL = " SELECT * FROM account WHERE account_id = '$payment[account_id]'";
			$account_QR = mysqli_query($con,$account_SL);
			$account 	= mysqli_fetch_array($account_QR);


			$pdf->MultiCell(0,8,iconv( 'UTF-8','TIS-620',$account[account_bank].' เลขบัญชี : '.$account[account_number].' จำนวน : '.number_format($order_list[order_list_price]).'.00 บาท วันที่ชำระ : '.displaydate($payment[payment_date])),0,10);

			$pdf->Cell (0,0,iconv( 'UTF-8', 'cp874'), '0','10','','',"http://".$fixed[fixed_website]."/cloud/payment_photo/".$payment[payment_photo]."" );
			$pdf->SetTextColor(100,149,237);
			$pdf->Cell (0,8,iconv( 'UTF-8', 'TIS-620', '(เปิดดูสลิป คลิก)' ), '0','10','','','http://'.$fixed[fixed_website].'/cloud/payment_photo/'.$payment[payment_photo].' ');

		}


		$pdf->SetTextColor(255,0,0);
		$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','เลขพัสดุ : '.$order_list[order_list_package]),0,10);

		$pdf->SetTextColor(0,0,0);
		$pdf->SetWidths(array(20,80,30,30,30));
		srand(microtime()*1000000);

		$pdf->Cell(0,5,'',0,8);
		$pdf->SetFont('angsab','',17);
		$pdf->Row(array(  iconv( 'UTF-8','TIS-620',' ลำดับ  ')   ,  iconv( 'UTF-8','TIS-620',' รายการ ')   ,iconv( 'UTF-8','TIS-620','จำนวน') ,iconv( 'UTF-8','TIS-620','หน่วยละ')   ,  iconv( 'UTF-8','TIS-620',' จำนวนเงิน ')     ));

		$or_product_SL = " SELECT * FROM or_product WHERE order_list_id = '$order_list[order_list_id]'";
		$or_product_QR 	= mysqli_query($con,$or_product_SL);
		$i=1;
		while ($or_product 	= mysqli_fetch_array($or_product_QR)) {

			$product_Sl = "SELECT * FROM product WHERE product_id = '$or_product[product_id]'";
			$product_Qr = mysqli_query($con,$product_Sl);
			$product = mysqli_fetch_array($product_Qr);

			$product_amount_price = $or_product[product_amount] * $product[product_price];

			$pdf->SetFont('angsa','',15);
			$pdf->Row(array(  
				iconv( 'UTF-8','TIS-620',number_format($i)) ,
				iconv( 'UTF-8','TIS-620', $product[product_name])   ,
				iconv( 'UTF-8','TIS-620', $or_product[product_amount])   ,
				iconv( 'UTF-8','TIS-620', number_format($product[product_price]).'.00')   ,
				iconv( 'UTF-8','TIS-620',number_format($product_amount_price).'.00')  
			));

			$i++;
		}

		$pdf->SetWidths(array(160,30));
		srand(microtime()*1000000);

		$pdf->Row(array(  
			iconv( 'UTF-8','TIS-620','รวม')   ,
			iconv( 'UTF-8','TIS-620',number_format($order_list[order_list_product]).'.00')  
		));


		$pdf->Row(array(  
			iconv( 'UTF-8','TIS-620',$order_list[order_list_p_name])   ,
			iconv( 'UTF-8','TIS-620',number_format($order_list[order_list_p_price]).'.00')  
		));

		$pdf->SetFont('angsab','',15);

		$pdf->Row(array(  
			iconv( 'UTF-8','TIS-620',"ราคารวมทั้งสิ้น (".Convert($order_list[order_list_price]).")")   ,
			iconv( 'UTF-8','TIS-620',number_format($order_list[order_list_price]).'.00')  
		));


		if(strchr($fixed[fixed_titlelogo],".")==".JPG" || strchr($fixed[fixed_titlelogo],".")==".jpg"|| strchr($fixed[fixed_titlelogo],".")==".jpeg"){
			$pdf->Image("cloud/fixed_titlelogo/".$fixed[fixed_titlelogo]."",'93',30,25,0,'jpg');
		}
		if(strchr($fixed[fixed_titlelogo],".")==".png" || strchr($fixed[fixed_titlelogo],".")==".PNG"){
			$pdf->Image("cloud/fixed_titlelogo/".$fixed[fixed_titlelogo]."",'93',30,25,0,'png');
		}


		$pdf->Output("invoice/".$invoice.".pdf","F");
		$location = "invoice/".$invoice.".pdf";

// ---------------- invoice 

		// member
		$strTo = $order_list[order_list_member_email];
		$strSubject = "การสั่งซื้อเสร็จสิ้น - ". $fixed[fixed_website];
		$strHeader = "Content-type: text/html; charset=utf-8\n";
		$strHeader .= "From: ".$fixed[fixed_sent]."\n";
		$strMessage = "";
		$strMessage .= "<h3> เรียนคุณ : ".$order_list[order_list_member_name]."  </h3>";
		$strMessage .= "<h3> คุณได้ทำการสั่งซื้อเรียบร้อยแล้ว </h3>";
		$strMessage .= "<p> เลขใบสั่งซื้อ :  ".$order_list[order_list_id]."  </p>";
		$strMessage .= "<p> จำนวนสินค้า : ".$order_list[order_list_amount]." </p>";
		$strMessage .= "<p> การจัดส่ง : ".$order_list[order_list_p_name]."  </p>";
		$strMessage .= "<p> ค่าจัดส่ง : ".$order_list[order_list_p_price]." บาท </p>";
		$strMessage .= "<p> ราคาสินค้า : ".number_format($order_list[order_list_product])." บาท </p>";
		$strMessage .= "<p> <h4> ยอดชำระเงินทั้งหมด : ".number_format($order_list[order_list_price])." บาท </h4>";
		$strMessage .= "<p> วิธีชำระเงิน : ".$order_list[order_list_cash_on_name]."  </p>";
		$strMessage .= "<p>  วันเวลาที่สั่งซื้อ : ".displaydate($order_list[order_list_date])."  ".$order_list[order_list_time]."  </p>";
		$strMessage .= "<h3> (แบบโอนเงิน) ชำระเงินโดยการโอนเงินไปที่  </h3>";
		$account_SL = " SELECT * FROM account ORDER BY account_id ASC";
		$account_QR 	= mysqli_query($con,$account_SL);
		$account_Row = mysqli_num_rows($account_QR);
		while ($account 	= mysqli_fetch_array($account_QR)) {
			$strMessage .= "<p> ธนาคาร : <b> ".$account[account_bank]." </b> / เลขบัญชี : <b> ".$account[account_number]." </b> / ชื่อบัญชี : <b> ".$account[account_name]." </b> /<p>";
		}
		$strMessage .= "<p> หลังจากชำระเงินแล้ว สามารถแจ้งโอนเงินที่ ". $fixed[fixed_website]."/payment.php </p>";
		$strMessage .= "<p> ค้นหาเลขพัสดุและตรวจสอบสถานะใบสั่งซื้อ ". $fixed[fixed_website]."/search_numbers.php </p>";
		$strMessage .= "<p> invoice-".$order_list[order_list_id]."  ".$fixed[fixed_website]."/".$location." </p>";
		$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
		// member

		// admin
		if (isset($fixed[fixed_inbox])&&trim($fixed[fixed_inbox])!='') {
			$strTo = $fixed[fixed_inbox];
			$strSubject = "รายการสั่งซื้อใหม่ - ".$fixed[fixed_website];
			$strHeader = "Content-type: text/html; charset=utf-8\n";
			$strHeader .= "From: ".$fixed[fixed_sent]."\n";
			$strMessage = "";
			$strMessage .= "<h3> รายการสั่งซื้อใหม่ </h3>";
			$strMessage .= "<h3>  วันเวลาที่สั่งซื้อ : ".displaydate($order_list[order_list_date])."  ".$order_list[order_list_time]."  </h3>";
			$strMessage .= "<h4> ".$fixed[fixed_website]."</h4>";
			$strMessage .= "<p> เลขใบสั่งซื้อ :  ".$order_list[order_list_id]."  </p>";
			$strMessage .= "<p> จำนวนสินค้า : ".$order_list[order_list_amount]." </p>";
			$strMessage .= "<p> การจัดส่ง : ".$order_list[order_list_p_name]."  </p>";
			$strMessage .= "<p> ค่าจัดส่ง : ".$order_list[order_list_p_price]." บาท </p>";
			$strMessage .= "<p> ราคาสินค้า : ".number_format($order_list[order_list_product])." บาท </p>";
			$strMessage .= "<p> <h4> ยอดชำระเงินทั้งหมด : ".number_format($order_list[order_list_price])." บาท </h4>";
			$strMessage .= "<p> วิธีชำระเงิน : ".$order_list[order_list_cash_on_name]."  </p>";
			$strMessage .= "<br>";
			$strMessage .= "<p>  ผู้ซื้อ : ".$order_list[order_list_member_name]."  </p>";
			$strMessage .= "<p>  อีเมล : ".$order_list[order_list_member_email]."  </p>";
			$strMessage .= "<p>  เบอร์ติดต่อ : ".$order_list[order_list_member_phone]."  </p>";
			$strMessage .= "<p>  ที่อยู่จัดส่ง : ".$order_list[order_list_member_address]."  </p>";
			$strMessage .= "<p>  รหัสไปรษณีย์ : ".$order_list[order_list_member_zipcode]."  </p>";

			$strMessage .= "<h4> รายการสินค้า </h4>";
			$or_product_SL = " SELECT * FROM or_product WHERE order_list_id = '$order_list[order_list_id]'";
			$or_product_QR 	= mysqli_query($con,$or_product_SL);
			while ($or_product 	= mysqli_fetch_array($or_product_QR)) {

				$product_Sl = "SELECT * FROM product WHERE product_id = '$or_product[product_id]'";
				$product_Qr = mysqli_query($con,$product_Sl);
				$product = mysqli_fetch_array($product_Qr);

				$strMessage .= " สินค้า : ".$product[product_name];
				$strMessage .= " รายละเอียดเบื้องต้น : ".$product[product_detail];
				$strMessage .= "<br>";
				$strMessage .= " ลิ้งสินค้า : <a target='_blank' href='http://".$fixed[fixed_website]."/product_detail.php?product_id=".$product[product_id]."'>(คลิก)</a> <br>";
				$strMessage .= " ราคา : ".number_format($product[product_price])."  <br>";
				$strMessage .= " จำนวน : ".number_format($or_product[product_amount])."  <br><br>";

			}
			$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
		}
		// end admin

		

		if ($order_list[order_list_cash_on_name]=='โอนเงิน') {
			echo"<script> alert('ยืนยันการสั่งซื้อเรียบร้อยแล้ว '); window.location='payment2.php'; </script>";
		}
		if ($order_list[order_list_cash_on_name]=='ใบส่งสินค้า') {
			echo"<script> alert('ยืนยันการสั่งซื้อเรียบร้อยแล้ว '); window.location='my_order_detail.php?order_list_id=$order_list[order_list_id]'; </script>";
		}
		if ($order_list[order_list_cash_on_name]=='เครดิต') {
			echo"<script> alert('ยืนยันการสั่งซื้อเรียบร้อยแล้ว '); window.location='my_order_detail.php?order_list_id=$order_list[order_list_id]'; </script>";
		}

		
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="canonical" href="https://<? echo $fixed[fixed_website]; ?>" >
	<title> <? if($_SESSION[Language]== "Thailand"){echo "ยืนยันการสั่งซื้อ"; } else{echo "Order confirmation"; } ?> | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>) ">
	<meta name="keywords" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<meta name="author" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navber.php'; ?>
	<div class="container ">
		<div class="row margintop30">
			<div class="col-md-12 resize">
				<p class="pagetopic">
					<? if($_SESSION[Language]== "Thailand"){echo "ยืนยันการสั่งซื้อ"; } else{echo "Order confirmation"; } ?>
				</p>
			</div>
		</div>
		<?
		if(isset($_SESSION[cart])){
			?>
			<form method="post" class="form-horizontal" >
				<div class="row">
					<div class="col-md-8">
						<div class="panel panel-default no-boxsha radius20" style="overflow: hidden;">
							<div class="panel-body bg-white ">
								<div class="col-md-12 text1">
									<div class="form-group">
										<label class="control-label col-md-2"> <? if($_SESSION[Language]== "Thailand"){echo "การจัดส่ง"; } else{echo "delivery"; } ?>   </label>
										<label class="control-label col-md-10 text-left">
											<? echo $portage[portage_name]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2"> <? if($_SESSION[Language]== "Thailand"){echo "วิธีชำระเงิน"; } else{echo "payment"; } ?>   </label>
										<label class="control-label col-md-10 text-left">
											<? echo $cash_on[cash_on_name]; ?>
										</label>
									</div>	
									<div class="form-group">
										<label class="control-label col-md-2" ><? if($_SESSION[Language]== "Thailand"){echo "ชื่อ - นามสกุล"; } else{echo "full name"; } ?></label>
										<label class="control-label col-md-10 text-left">
											<input minlength="5" name="member_name" value="<? echo $member[member_name]; ?>" type="text"  class="form-control"  required>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" ><? if($_SESSION[Language]== "Thailand"){echo "อีเมล"; } else{echo "email"; } ?> </label>
										<label class="control-label col-md-10 text-left">
											<input  minlength="5" name="member_email" value="<? echo $member[member_email]; ?>" type="email" class="form-control" >
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" ><? if($_SESSION[Language]== "Thailand"){echo "เบอร์โทร"; } else{echo "phone"; } ?></label>
										<label class="control-label col-md-10 text-left">
											<input  minlength="5" name="member_phone" value="<? echo $member[member_phone]; ?>" type="text" class="form-control" required>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" ><? if($_SESSION[Language]== "Thailand"){echo "ที่อยู่จัดส่ง"; } else{echo "Address"; } ?></label>
										<label class="control-label col-md-10 text-left">
											<textarea class="form-control" rows="2" name="member_address" ><? echo $member[member_address]; ?></textarea>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2" ><? if($_SESSION[Language]== "Thailand"){echo "รหัสไปรษณีย์"; } else{echo "zipcode"; } ?></label>
										<label class="control-label col-md-10 text-left">
											<input  minlength="5" name="member_zipcode" value="<? echo $member[member_zipcode]; ?>" type="text" class="form-control" required>
										</label>
									</div>
								</div>
							</div>
						</div>
						<!-- row -->
						<div class="row">
							<div class="col-md-12">

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
									<div class="panel panel-default no-boxsha radius20" style="overflow: hidden;">
										<div class="panel-body bg-white text1">
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
												<div class="col-md-5">
													<div class="bold size13">   <? if($_SESSION[Language]== "Thailand"){echo "สินค้า"; } else{echo "product"; } ?>   </div>
													<div class="size13">
														<?if($_SESSION[Language]== "Thailand"){	echo $product[product_name]; } else if($product[product_name_eng]!=''){	echo $product[product_name_eng];  }else{	echo $product[product_name];}?> 
													</div>
												</div>
												<div class="col-md-2">
													<div class="bold size13">   <? if($_SESSION[Language]== "Thailand"){echo "ราคา"; } else{echo "price"; } ?>  </div>
													<div class="size13">
														<? echo number_format($product[product_price]); ?> <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?> 
													</div>
												</div>
												<div class="col-md-2">
													<div class="bold size13"> <? if($_SESSION[Language]== "Thailand"){echo "จำนวน"; } else{echo "amount"; } ?>  </div>
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
											</div>
										</div>
									</div>
									<?php
									$i++;
								}
								$_SESSION[total] = $total; 
								$_SESSION[amount] = $amount; 
								$_SESSION[weight_price] = $weight[weight_price];
								$_SESSION[order_list_weight] = $order_list_weight;

								$_SESSION[order_list_price] = $_SESSION[total]+$weight[weight_price];
								?>

							</div>
						</div>
						<!-- row -->
					</div>
					<div class="col-md-4">
						<div class="panel panel-default no-boxsha radius20" style="overflow: hidden;">
							<div class="panel-body bg-white ">
								<div class="row">
									<div class="col-md-12 text-right text1">
										<h4>   <? if($_SESSION[Language]== "Thailand"){echo "จำนวน"; } else{echo "amount"; } ?>  :  <? echo $_SESSION[amount]; ?>  </h4>
										<h4> <? if($_SESSION[Language]== "Thailand"){echo "ราคารวม"; } else{echo "total price"; } ?> : <?php echo number_format($_SESSION[total]); ?> <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?></h4>
										<h4> <? if($_SESSION[Language]== "Thailand"){echo "ค่าจัดส่ง"; } else{echo "shipping cost"; } ?> : <?php echo number_format($weight[weight_price]); ?> <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?></h4>
										<h4 class="bold"> <? if($_SESSION[Language]== "Thailand"){echo "ยอดชำระเงินทั้งหมด"; } else{echo "Total payment"; } ?> : <?php echo number_format($_SESSION[order_list_price]); ?> <? if($_SESSION[Language]== "Thailand"){echo "บาท"; } else{echo "baht"; } ?></h4>
									</div>
								</div>
								<div class="row margintop15 text1">
									<div class="col-xs-12">
										<a href="product_cart.php" class="btn btn-default boxsha btn-block"> <? if($_SESSION[Language]== "Thailand"){echo "ไปที่ตะกร้า"; } else{echo "go to cart"; } ?> </a>
									</div>
									<div class="col-xs-12 top" style="text-align: center;">		
										<?
										if ($_SESSION[cart]=="" or !isset($_SESSION[cart]) or $_SESSION[cart]==NULL) {
											?>
											<a onclick="portage()" class="btn btn-main text1 ani-bounce " href=""><? if($_SESSION[Language]== "Thailand"){echo "ยืนยันการสั่งซื้อ"; } else{echo "order confirmation"; } ?></a>
											<script>
												function portage() {
													alert("ไม่มีสินค้าในตะกร้า");
												}
											</script>
											<?
										}
										else{
											?>
											<button type="submit" class="btn btn-main text1 ani-bounce boxsha btn-block" ><? if($_SESSION[Language]== "Thailand"){echo "ยืนยันการสั่งซื้อ"; } else{echo "order confirmation"; } ?></button>	
											<input type="hidden" name="submit_order" >
											<?
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			<?
		}
		else{
			?>
			<div class="row">
				<div class="col-md-9">
					<div class="panel panel-default no-border  boxsha4">
						<div class="panel-body bg-white ">
							<h1>
								<? if($_SESSION[Language]== "Thailand"){echo "ไม่มีสินค้าในตะกร้า"; } else{echo "no items"; } ?>
							</h1>
						</div>
					</div>
				</div>
			</div>
			<?
		}
		?>
	</div>
	<!-- container -->
	<div id="Updatemember" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel"><? if($_SESSION[Language]== "Thailand"){echo "แก้ไขข้อมูลส่วนตัว"; } else{echo "edit personal information"; } ?> </h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label" for="email"><? if($_SESSION[Language]== "Thailand"){echo "ชื่อ - นามสกุล"; } else{echo "full name"; } ?></label>
							<input minlength="5" name="member_name" value="<? echo $member[member_name]; ?>" type="text"  class="form-control"  required>
						</div>
						<div class="form-group">
							<label class="control-label" for="email"><? if($_SESSION[Language]== "Thailand"){echo "อีเมล"; } else{echo "email"; } ?>  </label>
							<input  minlength="5" name="member_email" value="<? echo $member[member_email]; ?>" type="email" class="form-control" >
						</div>
						<div class="form-group">
							<label class="control-label" for="email"><? if($_SESSION[Language]== "Thailand"){echo "เบอร์โทร"; } else{echo "phone"; } ?>  </label>
							<input  minlength="5" name="member_phone" value="<? echo $member[member_phone]; ?>" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="email"><? if($_SESSION[Language]== "Thailand"){echo "ที่อยู่จัดส่ง"; } else{echo "address"; } ?>  </label>
							<textarea class="form-control" rows="2" name="member_address" ><? echo $member[member_address]; ?></textarea>
						</div>
						<div class="form-group">
							<label class="control-label" for="email"> <? if($_SESSION[Language]== "Thailand"){echo "รหัสไปรษณีย์"; } else{echo "zipcode"; } ?>  </label>
							<input  minlength="5" name="member_zipcode" value="<? echo $member[member_zipcode]; ?>" type="text" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-main text1">
							<span class="glyphicon glyphicon-floppy-disk"></span> <? if($_SESSION[Language]== "Thailand"){echo "บันทึกการแก้ไข"; } else{echo "submit"; } ?>
						</button>
						<input Type="hidden" name="Updatemember" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal"> <? if($_SESSION[Language]== "Thailand"){echo "ยกเลิก"; } else{echo "close"; } ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<? include 'index_Footer.php'; ?>
</body>
</html>