<?
include 'index_IncludeAdmin.php'; 


$billrequest_SL 		= " SELECT * FROM billrequest WHERE billrequest_id = '$_GET[billrequest_id]'";
$billrequest_QR 		= mysqli_query($con,$billrequest_SL);
$billrequest 		= mysqli_fetch_array($billrequest_QR);


$receipt = 'receipt-'.$billrequest[billrequest_order_id];

require('fpdf_mc_table.php');
define('FPDF_FONTPATH','font/');

$pdf=new PDF_MC_Table();
$pdf->AddPage();

$pdf->AddFont('angsab','','angsab.php');
$pdf->AddFont('angsa','','angsa.php');


$pdf->SetFont('angsab','',27);
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ใบเสร็จรับเงิน/ใบกำกับภาษี'),0,10,'C');


$pdf->SetFont('angsa','',16);
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','เลขที่ '.$billrequest[billrequest_order_id].'   วันที่ : '.$billrequest[billrequest_date]),0,10,'C');



$pdf->SetFont('angsa','',13);
$pdf->Cell(0,10,'',0,10, 'R');
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620',$fixed[fixed_address01]),0,10, 'R');
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620',$fixed[fixed_address02]),0,10, 'R');
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620',$fixed[fixed_address03]),0,10, 'R');

$pdf->SetFont('angsa','',16);
$pdf->Cell(0,10,'',0,10, 'R');
$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','นามลูกค้า : '.$billrequest[billrequest_member_name]),0,10);
$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','ที่อยู่ : '.$billrequest[billrequest_member_address].'  รหัสไปรษณีย์ : '.$billrequest[billrequest_member_zipcode]),0,10);
$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','เบอร์มือถือ : '.$billrequest[billrequest_member_phone].'  อีเมล์ : '.$billrequest[billrequest_member_email]),0,10);
$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','เลขพัสดุ : '.$billrequest[billrequest_package]),0,10);

$pdf->SetTextColor(0,0,0);
$pdf->SetWidths(array(20,80,30,30,30));
srand(microtime()*1000000);


$pdf->Cell(0,5,iconv(''),0,8);
$pdf->SetFont('angsab','',17);
$pdf->Row(array(  iconv( 'UTF-8','TIS-620',' ลำดับ  ')   ,  iconv( 'UTF-8','TIS-620',' รายการ ')   ,iconv( 'UTF-8','TIS-620','จำนวน') ,iconv( 'UTF-8','TIS-620','หน่วยละ')   ,  iconv( 'UTF-8','TIS-620',' จำนวนเงิน ')     ));

$pdf->SetFont('angsa','',15);
$pdf->Row(array(  
	iconv( 'UTF-8','TIS-620',number_format(1)) ,
	iconv( 'UTF-8','TIS-620', $billrequest[billrequest_product_name])   ,
	iconv( 'UTF-8','TIS-620', $billrequest[billrequest_product_amount])   ,
	iconv( 'UTF-8','TIS-620', number_format($billrequest[billrequest_product_price]).'.00')   ,
	iconv( 'UTF-8','TIS-620',number_format($billrequest[billrequest_product_amount_price]).'.00')  
));


$pdf->SetWidths(array(160,30));
srand(microtime()*1000000);

$pdf->Row(array(  
	iconv( 'UTF-8','TIS-620','รวม')   ,
	iconv( 'UTF-8','TIS-620',number_format($billrequest[billrequest_product]).'.00')  
));


$pdf->Row(array(  
	iconv( 'UTF-8','TIS-620',$billrequest[billrequest_p_name])   ,
	iconv( 'UTF-8','TIS-620',number_format($billrequest[billrequest_p_price]).'.00')  
));

$pdf->SetFont('angsab','',15);

$pdf->Row(array(  
	iconv( 'UTF-8','TIS-620',"ราคารวมทั้งสิ้น (".Convert($billrequest[billrequest_price]).")")   ,
	iconv( 'UTF-8','TIS-620',number_format($billrequest[billrequest_price]).'.00')  
));



if(strchr($fixed[fixed_titlelogo],".")==".JPG" || strchr($fixed[fixed_titlelogo],".")==".jpg"|| strchr($fixed[fixed_titlelogo],".")==".jpeg"){
	$pdf->Image("../cloud/fixed_titlelogo/".$fixed[fixed_titlelogo]."",'93',30,25,0,'jpg');
}
if(strchr($fixed[fixed_titlelogo],".")==".png" || strchr($fixed[fixed_titlelogo],".")==".PNG"){
	$pdf->Image("../cloud/fixed_titlelogo/".$fixed[fixed_titlelogo]."",'93',30,25,0,'png');
}

$pdf->Output("receipt/".$receipt.".pdf","F");
$location = "receipt/".$receipt.".pdf";


?>

<script>  window.location='<? echo $location; ?>'; </script>