<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[RelatedID])){
	$_SESSION[RelatedID] =  $_GET[RelatedID];
}
$RelatedID =   $_SESSION[RelatedID] ;

$Related_Del ="DELETE FROM `Related` WHERE RelatedID = '$RelatedID' ";
$Related_Qurey  = mysqli_query($con,$Related_Del);

if($Related_Qurey) {
	echo"<script>  window.location='Product_One.php?DELETE'; </script>";
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