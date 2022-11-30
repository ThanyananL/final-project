<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[PhotosStoreID])){
	$_SESSION[PhotosStoreID] =  $_GET[PhotosStoreID];
}
$PhotosStoreID =   $_SESSION[PhotosStoreID] ;

$PhotosStore_SL = " SELECT * FROM PhotosStore WHERE PhotosStoreID = '$PhotosStoreID'";
$PhotosStore_QR = mysqli_query($con,$PhotosStore_SL);
$PhotosStore 	= mysqli_fetch_array($PhotosStore_QR);

@unlink("../Photo/PhotosStore/".$PhotosStore['PhotosStoreFile']);

$PhotosStore_Del ="DELETE FROM `PhotosStore` WHERE PhotosStoreID = '$PhotosStoreID' ";
$PhotosStore_Qurey  = mysqli_query($con,$PhotosStore_Del);

if($PhotosStore_Qurey) 
{
	echo"<script>  window.location='PhotosStore.php?DELETE'; </script>";
}
else
{
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