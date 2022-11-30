<?
include 'index_Include.php'; 
$_SESSION['page'] = 'portage.php';

// ---------------- invoice 

$order_list_SL = " SELECT * FROM order_list WHERE order_list_id = '$_SESSION[order_list_id]'";
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
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ใบสั่งซื้อสินค้า'),0,10);


$pdf->SetFont('angsa','',16);
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','วันที่ : '.displaydate($order_list[order_list_date])),0,10);

$pdf->Cell(152);
$pdf->MultiCell(0,0,iconv( 'UTF-8','TIS-620','เลขที่ '.$order_list[order_list_id]),0,10);

$pdf->SetFont('angsa','',19);
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620',$fixed[fixed_address01]),0,10, 'R');
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620',$fixed[fixed_address02]),0,10, 'R');
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620',$fixed[fixed_address03]),0,10, 'R');



$pdf->SetFont('angsab','',19);
$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','ลูกค้า'),0,10);
$pdf->SetFont('angsa','',19);
$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','นามลูกค้า : '.$order_list[order_list_member_name]),0,10);
$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','ที่อยู่ : '.$order_list[order_list_member_address].' รหัสไปรษณีย์ '.$order_list[order_list_member_zipcode]),0,10);
$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','เบอร์มือถือ : '.$order_list[order_list_member_phone]),0,10);
$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','อีเมล์ : '.$order_list[order_list_member_email]),0,10);

$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','สถานะ : '.$order_list_status[order_list_status_name]),0,10);
$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','เลขพัสดุ : '.$order_list[order_list_package]),0,10);

$pdf->SetWidths(array(20,80,30,30,30));
srand(microtime()*1000000);

$pdf->Cell(0,5,iconv(''),0,8);
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
	$pdf->Image("cloud/fixed_titlelogo/".$fixed[fixed_titlelogo]."",160,30,30,0,'jpg');
}
if(strchr($fixed[fixed_titlelogo],".")==".png" || strchr($fixed[fixed_titlelogo],".")==".PNG"){
	$pdf->Image("cloud/fixed_titlelogo/".$fixed[fixed_titlelogo]."",160,30,30,0,'png');
}

$pdf->Output("invoice/".$invoice.".pdf","F");
$location = "invoice/".$invoice.".pdf";

echo"<script> window.location='$location'; </script>";


?>

<!DOCTYPE html>
<html>
<head></head>
<body></body>
</html>