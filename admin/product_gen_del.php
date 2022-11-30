<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[product_gen_id])){
	$_SESSION[product_gen_id] =  $_GET[product_gen_id];
}
$product_gen_id =   $_SESSION[product_gen_id] ;

$product_gen_Del ="DELETE FROM `product_gen` WHERE product_gen_id = '$product_gen_id' ";
$product_gen_Qurey  = mysqli_query($con,$product_gen_Del);

if($product_gen_Qurey) {
	$proportion_name = " ";
	$product_gen_SL = " SELECT * FROM product_gen WHERE product_id = '$_GET[product_id]'";
	$product_gen_QR 	= mysqli_query($con,$product_gen_SL);
	while ($product_gen 	= mysqli_fetch_array($product_gen_QR)) {
		$proportion_name .= $product_gen["product_gen_name"];
		$proportion_name .= " , ";
	}

	$product_Update = "UPDATE `product` SET `product_datetime` = NOW(), `proportion_name` = '$proportion_name' WHERE `product_id` = '$_GET[product_id]'";
	$product_Reult = mysqli_query($con,$product_Update);
	if (!$product_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}


	echo"<script>  window.location='product_one.php?DELETE'; </script>";
}
else{
	echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
}

?>
<html>
<head>
	<?php include 'index_Head.php'; ?>
</head>
<body>

</body>
</html>