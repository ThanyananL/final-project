<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[slides_id])){
	$_SESSION[slides_id] =  $_GET[slides_id];
}
$slides_id =   $_SESSION[slides_id] ;

$slides_SL = " SELECT * FROM slides WHERE slides_id = '$slides_id'";
$slides_QR = mysqli_query($con,$slides_SL);
$slides 	= mysqli_fetch_array($slides_QR);

@unlink("../Files/slides_photo/".$slides['slides_photo']);

$slides_Del ="DELETE FROM `slides` WHERE slides_id = '$slides_id' ";
$slides_Qurey  = mysqli_query($con,$slides_Del);

if($slides_Qurey) {
	echo"<script>  window.location='slides.php?DELETE'; </script>";
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