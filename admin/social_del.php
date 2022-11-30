<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[social_id])){
	$_SESSION[social_id] =  $_GET[social_id];
}
$social_id =   $_SESSION[social_id] ;

$social_SL = " SELECT * FROM social WHERE social_id = '$social_id'";
$social_QR = mysqli_query($con,$social_SL);
$social 	= mysqli_fetch_array($social_QR);

@unlink("../cloud/social_photo/".$social['social_photo']);

$social_Del ="DELETE FROM `social` WHERE social_id = '$social_id' ";
$social_Qurey  = mysqli_query($con,$social_Del);

if($social_Qurey) {
	echo"<script>  window.location='social.php?DELETE'; </script>";
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