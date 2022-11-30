
<?php
include 'connect/connect.php';

if (trim($_SESSION['member_online_id'])!=""&&isset($_SESSION['member_online_id'])) {
	$member_SL = " SELECT * FROM member WHERE member_id = '$_SESSION[member_online_id]'";
	$member_QR 	= mysqli_query($con,$member_SL);
	$member 	= mysqli_fetch_array($member_QR);
}

if (isset($_GET[Language])){
	$_SESSION[Language] = $_GET[Language];
}
if (!isset($_SESSION[Language])) {
	$_SESSION[Language]= "Thailand";
}

include 'index_function.php';
?>
