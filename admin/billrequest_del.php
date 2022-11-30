<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[billrequest_id])){
	$_SESSION[billrequest_id] =  $_GET[billrequest_id];
}
$billrequest_id =   $_SESSION[billrequest_id] ;

$billrequest_Del ="DELETE FROM `billrequest` WHERE billrequest_id = '$billrequest_id' ";
$billrequest_Qurey  = mysqli_query($con,$billrequest_Del);

if($billrequest_Qurey) {
	echo"<script>  window.location='billrequest.php?DELETE'; </script>";
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