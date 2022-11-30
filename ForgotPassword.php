<? 
include 'index_Include.php'; 
$_SESSION['page'] = 'signup.php';

if ($_POST['SubmitForgot']) {

	$member_email = $_POST['member_email'];	

	$Forgot_Select = "SELECT * FROM `member` WHERE member_email = '$member_email' ";
	$Forgot_Reult = mysqli_query($con,$Forgot_Select);
	$Forgot_Row 		= mysqli_num_rows($Forgot_Reult);
	if (!$Forgot_Reult) {
		echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
	}
	if ($Forgot_Row > 0) {

		$Forgot = mysqli_fetch_array($Forgot_Reult);

		$strTo = $Forgot[member_email];
		$strSubject = "แจ้งรหัสผ่าน - ". $fixed[fixed_website];
		$strHeader = "Content-type: text/html; charset=utf-8\n";
		$strHeader .= "From: ".$fixed[fixed_sent]."\n";
		$strMessage = "";
		$strMessage .= "<br>";
		$strMessage .= "<h4> เรียนคุณ : ".$Forgot[member_name]." </h4>";
		$strMessage .= "<h4> คุณได้ทำการแจ้งลืมรหัสผ่าน </h4>";
		$strMessage .= "รหัสผ่านของคุณคือ : ".$Forgot[member_password]." <br>";
		$strMessage .= "<br><br>";
		$strMessage .= $fixed[fixed_website];
		$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);


		echo"<script>alert('ส่งรหัสผ่านไปยังอีเมล ".$member_email." เรียบร้อยแล้ว '); window.history.back(); </script>";
	}
	else{
		echo"<script>alert('ไม่มีอีเมลนี้'); window.history.back(); </script>";
	}


}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="canonical" href="https://<? echo $fixed[fixed_website]; ?>" >
 	<title> ลืมรหัสผ่าน <? echo $fixed[fixed_company]; ?> - <? echo $fixed[fixed_topic]; ?> | <? echo $fixed[fixed_website]; ?> </title>
 	<meta name="description" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>) ">
 	<meta name="keywords" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
 	<meta name="author" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navber.php'; ?>
	<div class="container br-padding4">
		<div class="row margintop30">
			<div class="col-md-12 resize">
				<p class="pagetopic">
					ลืมรหัสผ่าน
				</p>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default no-border boxsha4">
					<div class="panel-body">
						<form method="post">
							<div class="form-group">
								<label class="control-label">อีเมล  <span class="text-red"> * </span> <small> ข้อมูลอาจอยู่ในอีเมลขยะ </small>  </label>
								<input required name="member_email" type="email" class="form-control" placeholder="ระบบจะส่งรหัสไปยังอีเมลของท่าน" >
							</div>
							<button type="submit" class="btn btn-default boxsha btn-block">ส่งข้อมูล</button>
							<input type="hidden" name="SubmitForgot" value="x">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<? include 'index_Footer.php'; ?>
</body>
</html>