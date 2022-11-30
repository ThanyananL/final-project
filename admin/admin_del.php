<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[admin_id])){
	$_SESSION[admin_id] =  $_GET[admin_id];
}
$admin_id =   $_SESSION[admin_id] ;


$admin_SL = " SELECT * FROM admin WHERE admin_id = '$admin_id'";
$admin_QR = mysqli_query($con,$admin_SL);
$admin 	= mysqli_fetch_array($admin_QR);

$Historylog      = " INSERT INTO `Historylog` ( HistorylogDate,  HistorylogTime , HistorylogIP, HistorylogAgent, Historyloglanguage, Historylogadmin, admin_id, admin_name ) VALUES (NOW(), NOW(),'$_SERVER[REMOTE_ADDR]','$_SERVER[HTTP_USER_AGENT]','$_SERVER[HTTP_ACCEPT_LANGUAGE]','admin_del  $admin[admin_name]','$_SESSION[admin_id]','$LoginData[admin_name]')";
$HistorylogQuery = mysqli_query($con,$Historylog);

$admin_del ="DELETE FROM `admin` WHERE admin_id = '$admin_id' ";
$admin_Qurey  = mysqli_query($con,$admin_del);

if($admin_Qurey) {
	echo"<script>  window.location='admin.php?DELETE'; </script>";
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