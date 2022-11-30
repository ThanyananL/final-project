<? 
include 'index_Include.php'; 
$_SESSION['page'] = 'index_login';

if ($_POST['index_login']) {

	$member_login = $_POST['member_login'];
	$member_password = $_POST['member_password'];

	$Login_Add = "SELECT * FROM `member` WHERE member_password = '$member_password' AND ( member_email = '$member_login' OR member_phone = '$member_login' ) ";
	$Login_Reult = mysqli_query($con,$Login_Add);
	$Login_Row 		= mysqli_num_rows($Login_Reult);
	if (!$Login_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($Login_Row > 0) {
		$Login = mysqli_fetch_array($Login_Reult);
		$_SESSION['member_online_id'] = $Login['member_id'];
		if ($_SESSION[page]=='product_cart.php') {
			header("Location:product_cart.php");
		}
		else{
			echo"<script>alert('เข้าสู่ระบบเรียบร้อยแล้ว'); window.history.back();  </script>";
		}
	}
	else{
		echo"<script>alert('อีเมล เบอร์โทรศัพท์ หรือ รหัสผ่าน ไม่ถูกต้อง'); window.history.back(); </script>";
	}
}



?>
<!DOCTYPE html>
<html>
<head>
	<? include 'index_Head.php'; ?>
</head>
<body>
</body>
</html>
