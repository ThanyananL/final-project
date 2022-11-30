<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[product_id])){
	$_SESSION[product_id] =  $_GET[product_id];
}
$product_id =   $_SESSION[product_id] ;

$product_SL = " SELECT * FROM product WHERE product_id = '$product_id'";
$product_QR = mysqli_query($con,$product_SL);
$product 	= mysqli_fetch_array($product_QR);

@unlink("../cloud/product_min/".$product['product_photo']);
@unlink("../cloud/product_photo/".$product['product_photo']);

$product_picture_SL = " SELECT * FROM product_picture WHERE product_id = '$product_id'";
$product_picture_QR = mysqli_query($con,$product_picture_SL);
while ($product_picture 	= mysqli_fetch_array($product_picture_QR)) {
	@unlink("../cloud/product_picture_photo/".$product_picture['product_picture_photo']);
}

$product_picture_Del ="DELETE FROM `product_picture` WHERE product_id = '$product_id' ";
$product_picture_Qurey  = mysqli_query($con,$product_picture_Del);

$product_gen_Del ="DELETE FROM `product_gen` WHERE product_id = '$product_id' ";
$product_gen_Qurey  = mysqli_query($con,$product_gen_Del);

$product_update = "UPDATE `product` SET `product_status_id` = '3'  WHERE `product_id` = '$product_id'";
$product_Reult = mysqli_query($con,$product_update);

if($product_Reult) {
	echo"<script>  window.location='product.php?DELETE'; </script>";
}
else{
	echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'index_link.php'; ?>
</head>
<body>

</body>
</html>