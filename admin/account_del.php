<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[account_id])){
	$_SESSION[account_id] =  $_GET[account_id];
}
$account_id =   $_SESSION[account_id] ;


$account_SL = " SELECT * FROM account WHERE account_id = '$account_id'";
$account_QR = mysqli_query($con,$account_SL);
$account 	= mysqli_fetch_array($account_QR);


@unlink("../cloud/account_photo/".$account['account_photo']);


$account_Del ="DELETE FROM `account` WHERE account_id = '$account_id' ";
$account_Qurey  = mysqli_query($con,$account_Del);

if($account_Qurey) {
	echo"<script>  window.location='account.php?DELETE'; </script>";
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