<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[catalog_id])){
	$_SESSION[catalog_id] =  $_GET[catalog_id];
}
$catalog_id =   $_SESSION[catalog_id] ;


$catalog_SL = " SELECT * FROM catalog WHERE catalog_id = '$catalog_id'";
$catalog_QR = mysqli_query($con,$catalog_SL);
$catalog 	= mysqli_fetch_array($catalog_QR);

@unlink("../cloud/catalog_photo/".$catalog['catalog_photo']);
@unlink("../cloud/catalog_min/".$catalog['catalog_photo']);

$catalog_picture_SL = " SELECT * FROM catalog_picture WHERE catalog_id = '$catalog_id'";
$catalog_picture_QR = mysqli_query($con,$catalog_picture_SL);
while ($catalog_picture 	= mysqli_fetch_array($catalog_picture_QR)) {
	@unlink("../cloud/catalog_picture_photo/".$catalog_picture['catalog_picture_photo']);
}

$catalog_picture_Del ="DELETE FROM `catalog_picture` WHERE catalog_id = '$catalog_id' ";
$catalog_picture_Qurey  = mysqli_query($con,$catalog_picture_Del);

$Historylog      = " INSERT INTO `Historylog` ( HistorylogDate,  HistorylogTime , HistorylogIP, HistorylogAgent, Historyloglanguage, Historylogcatalog, admin_id, admin_name ) VALUES (NOW(), NOW(),'$_SERVER[REMOTE_ADDR]','$_SERVER[HTTP_USER_AGENT]','$_SERVER[HTTP_ACCEPT_LANGUAGE]','catalog_del  $catalog[catalog_name]','$_SESSION[admin_id]','$LoginData[admin_name]')";
$HistorylogQuery = mysqli_query($con,$Historylog);

$catalog_del ="DELETE FROM `catalog` WHERE catalog_id = '$catalog_id' ";
$catalog_Qurey  = mysqli_query($con,$catalog_del);

if($catalog_Qurey) {
	echo"<script>  window.location='catalog.php?DELETE'; </script>";
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