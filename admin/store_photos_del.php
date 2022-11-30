<?php include 'index_IncludeAdmin.php';  ?>

<?php
if (isset($_GET[store_photos_id])){
	$_SESSION[store_photos_id] =  $_GET[store_photos_id];
}
$store_photos_id =   $_SESSION[store_photos_id] ;

$store_photos_SL = " SELECT * FROM store_photos WHERE store_photos_id = '$store_photos_id'";
$store_photos_QR = mysqli_query($con,$store_photos_SL);
$store_photos 	= mysqli_fetch_array($store_photos_QR);

@unlink("../cloud/store_photos_img/".$store_photos['store_photos_img']);

$store_photos_Del ="DELETE FROM `store_photos` WHERE store_photos_id = '$store_photos_id' ";
$store_photos_Qurey  = mysqli_query($con,$store_photos_Del);

if($store_photos_Qurey) {
	echo"<script>  window.location='store_photos.php?DELETE'; </script>";
}
else{
	echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'index_Head.php'; ?>
</head>
<body>

</body>
</html>