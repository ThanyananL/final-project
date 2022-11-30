
<?php

include '../connect/connect.php';

if (trim($_SESSION['login_admin_id'])!=""&&isset($_SESSION['login_admin_id'])) {

	$login_admin_SL = " SELECT * FROM admin WHERE admin_id = '$_SESSION[login_admin_id]'";
	$login_admin_QR 	= mysqli_query($con,$login_admin_SL);
	$login_admin 	= mysqli_fetch_array($login_admin_QR);

}

include 'index_function.php';

?>
