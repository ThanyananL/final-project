
<? 

$Rowproduct_SL = " SELECT product_id FROM product WHERE ( product_status_id != '3')  ";
$Rowproduct_QR = mysqli_query($con,$Rowproduct_SL);
$Rowproduct  = mysqli_num_rows($Rowproduct_QR);

$Rowslides_SL = " SELECT slides_id FROM slides";
$Rowslides_QR = mysqli_query($con,$Rowslides_SL);
$Rowslides  = mysqli_num_rows($Rowslides_QR); 

$Rowsocial_SL = " SELECT social_id FROM social";
$Rowsocial_QR = mysqli_query($con,$Rowsocial_SL);
$Rowsocial  = mysqli_num_rows($Rowsocial_QR); 

$Rowportage_SL = " SELECT portage_id FROM portage";
$Rowportage_QR = mysqli_query($con,$Rowportage_SL);
$Rowportage  = mysqli_num_rows($Rowportage_QR); 

$Rowmember_SL = " SELECT member_id FROM member";
$Rowmember_QR = mysqli_query($con,$Rowmember_SL);
$Rowmember  = mysqli_num_rows($Rowmember_QR); 

$Roworder_list_SL = " SELECT order_list_id FROM order_list WHERE order_list_status !='5'";
$Roworder_list_QR = mysqli_query($con,$Roworder_list_SL);
$Roworder_list  = mysqli_num_rows($Roworder_list_QR); 

$Rowpayment_SL = " SELECT payment_id FROM payment";
$Rowpayment_QR = mysqli_query($con,$Rowpayment_SL);
$Rowpayment  = mysqli_num_rows($Rowpayment_QR); 

$Rowaccount_SL = " SELECT account_id FROM account";
$Rowaccount_QR = mysqli_query($con,$Rowaccount_SL);
$Rowaccount  = mysqli_num_rows($Rowaccount_QR);

$Rowcontactus_SL = " SELECT contactus_id FROM contactus";
$Rowcontactus_QR = mysqli_query($con,$Rowcontactus_SL);
$Rowcontactus  = mysqli_num_rows($Rowcontactus_QR);

$Rowcatalog_SL = " SELECT catalog_id FROM catalog";
$Rowcatalog_QR = mysqli_query($con,$Rowcatalog_SL);
$Rowcatalog  = mysqli_num_rows($Rowcatalog_QR);    

$Rowarticle_SL = " SELECT article_id FROM article";
$Rowarticle_QR = mysqli_query($con,$Rowarticle_SL);
$Rowarticle  = mysqli_num_rows($Rowarticle_QR);  

$Rowstore_photos_SL = " SELECT store_photos_id FROM store_photos";
$Rowstore_photos_QR = mysqli_query($con,$Rowstore_photos_SL);
$Rowstore_photos  = mysqli_num_rows($Rowstore_photos_QR);  

$row_order_list_check_notification_SL = " SELECT * FROM order_list WHERE notification_id = '1' and  order_list_status !='5' ";
$row_order_list_check_notification_QR = mysqli_query($con,$row_order_list_check_notification_SL);
$row_order_list_check_notification  = mysqli_num_rows($row_order_list_check_notification_QR);

$row_payment_check_notification_SL = " SELECT * FROM payment WHERE  notification_id = '1' ";
$row_payment_check_notification_QR = mysqli_query($con,$row_payment_check_notification_SL);
$row_payment_check_notification  = mysqli_num_rows($row_payment_check_notification_QR);

$row_contactus_check_notification_SL = " SELECT * FROM contactus WHERE  notification_id = '1' ";
$row_contactus_check_notification_QR = mysqli_query($con,$row_contactus_check_notification_SL);
$row_contactus_check_notification  = mysqli_num_rows($row_contactus_check_notification_QR);
?>

<div class="visible-lg visible-md">
  <?php include 'index_menu_all.php'; ?>
</div>
