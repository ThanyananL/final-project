<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[order_list_id])){
	$_SESSION[order_list_id] =  $_GET[order_list_id];
}
$order_list_id =   $_SESSION[order_list_id] ;

$order_list_Update = "UPDATE `order_list` SET `order_list_status` = '5'  WHERE `order_list_id` = '$order_list_id'";
$order_list_Reult = mysqli_query($con,$order_list_Update);

if($order_list_Reult) {
	echo"<script>  window.location='order_list.php?DELETE'; </script>";
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