<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[payment_id])){
	$_SESSION[payment_id] =  $_GET[payment_id];
}
$payment_id =   $_SESSION[payment_id] ;


$payment_SL = " SELECT * FROM payment WHERE payment_id = '$payment_id'";
$payment_QR = mysqli_query($con,$payment_SL);
$payment 	= mysqli_fetch_array($payment_QR);

@unlink("../cloud/payment_photo/".$payment['payment_photo']);

$payment_Del ="DELETE FROM `payment` WHERE payment_id = '$payment_id' ";
$payment_Qurey  = mysqli_query($con,$payment_Del);


if($payment_Qurey) {
	echo"<script>  window.location='payment.php'; </script>";
}
else{
	echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
}

?>

<html>
<head>
	<?php include 'index_link.php'; ?>
</head>
<body>

</body>
</html>