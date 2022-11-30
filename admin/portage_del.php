<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[portage_id])){
	$_SESSION[portage_id] =  $_GET[portage_id];
}
$portage_id =   $_SESSION[portage_id] ;

$portage_Del ="DELETE FROM `portage` WHERE portage_id = '$portage_id' ";
$portage_Qurey  = mysqli_query($con,$portage_Del);

if($portage_Qurey) {
	echo"<script>  window.location='portage.php?DELETE'; </script>";
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