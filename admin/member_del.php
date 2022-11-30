<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[member_id])){
	$_SESSION[member_id] =  $_GET[member_id];
}
$member_id =   $_SESSION[member_id] ;

$member_Del ="DELETE FROM `member` WHERE member_id = '$member_id' ";
$member_Qurey  = mysqli_query($con,$member_Del);

if($member_Qurey) {
	echo"<script>  window.location='member.php?DELETE'; </script>";
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