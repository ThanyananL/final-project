<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[contactus_id])){
	$_SESSION[contactus_id] =  $_GET[contactus_id];
}
$contactus_id =   $_SESSION[contactus_id] ;

$contactus_Del ="DELETE FROM `contactus` WHERE contactus_id = '$contactus_id' ";
$contactus_Qurey  = mysqli_query($con,$contactus_Del);

if($contactus_Qurey) {
	echo"<script>  window.location='contactus.php?DELETE'; </script>";
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