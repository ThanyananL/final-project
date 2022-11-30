<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[weight_id])){
	$_SESSION[weight_id] =  $_GET[weight_id];
}
$weight_id =   $_SESSION[weight_id] ;

$weight_Del ="DELETE FROM `weight` WHERE weight_id = '$weight_id' ";
$weight_Qurey  = mysqli_query($con,$weight_Del);

if($weight_Qurey) {
	echo"<script>  window.location='weight.php?DELETE'; </script>";
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