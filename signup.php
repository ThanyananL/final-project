<? 
include 'index_Include.php'; 
$_SESSION['page'] = 'signup.php';

if ($_POST['submit_signup']) {

	if ($_POST['member_password']!=$_POST['member_password_con']) {
		echo"<script>alert('กรุณากรอกรหัสผ่านให้ตรงกันนะค่ะ'); window.history.back(); </script>";
	}
	else{
		$member_name = function_teeth($_POST['member_name']);
		$member_email = function_teeth($_POST['member_email']);
		$member_address = function_teeth($_POST['member_address']);
		$member_password = function_teeth($_POST['member_password']);
		$member_phone = function_teeth($_POST['member_phone']);
		$member_zipcode = function_teeth($_POST['member_zipcode']);

		$member_Add = "INSERT INTO `member` (`member_now`,`member_phone`,`member_name`,`member_email`,`member_address`,`member_password`,`member_zipcode`) "; 
		$member_Add .=" VALUES (NOW(),'$member_phone','$member_name','$member_email','$member_address','$member_password','$member_zipcode')";

		$member_Reult = mysqli_query($con,$member_Add);
		$member_id = mysqli_insert_id($con);
		if (!$member_Reult) {
			echo"<script>alert('อีเมล หรือ เบอร์โทรศัพท์ อาจมีคนใช้แล้ว'); window.history.back(); </script>";
		}
		if ($member_Reult) {
			$member_login_Add = "SELECT * FROM `member` WHERE member_id = '$member_id'";
			$member_login_Reult = mysqli_query($con,$member_login_Add);
			$member_login_Row 		= mysqli_num_rows($member_login_Reult);
			if (!$member_login_Reult) {
				echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
			}
			if ($member_login_Row > 0) {
				$member_login = mysqli_fetch_array($member_login_Reult);
				$_SESSION['member_online_id'] = $member_login['member_id'];


				if (isset($member_login[member_email])&& trim($member_login[member_email])!='') {

					$strTo = $member_login[member_email];
					$strSubject = "คุณได้สมัครสมาชิกเรียบร้อยแล้ว - ".$fixed[fixed_website];
					$strHeader = "Content-type: text/html; charset=utf-8\n";
					$strHeader .= "From: ".$fixed[fixed_website]."<".$fixed[fixed_sent].">\n";
					$strMessage = "";
					$strMessage .= "<h3> ข้อมูลสมาชิก </h3>";
					$strMessage .= "<p><b> ชื่อ - นามสกุล : </b> ".$member_login[member_name]."  <p>";
					$strMessage .= "<p><b> อีเมล : </b>".$member_login[member_email]." <p>";
					$strMessage .= "<p><b> เบอร์ติดต่อ : </b>".$member_login[member_phone]."  <p>";
					$strMessage .= "<p><b> ที่อยู่จัดส่ง : </b>".$member_login[member_address]."  <p>";
					$strMessage .= "<p><b> รหัสไปรษณีย์ : </b>".$member_login[member_zipcode]."  <p>";
					$strMessage .= "<p><b> รหัสผ่าน : </b>".$member_login[member_password]."  <p>";
					$strMessage .= "<p><b> เป็นสมาชิกเมื่อ </b> : ".$member_login[member_now]."  <p>";
					$strMessage .= "<p><b> ".$fixed[fixed_website]." </b> <p>";

					$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);

				}


				$strTo = $fixed[fixed_inbox];
				$strSubject = "สมาชิกใหม่ - ".$fixed[fixed_website];
				$strHeader = "Content-type: text/html; charset=utf-8\n";
				$strHeader .= "From: ".$fixed[fixed_website]."<".$fixed[fixed_sent].">\n";
				$strMessage = "";
				$strMessage .= "<h3> ข้อมูลสมาชิกใหม่ </h3>";
				$strMessage .= "<p><b> ชื่อ - นามสกุล : </b> ".$member_login[member_name]."  <p>";
				$strMessage .= "<p><b> อีเมล : </b>".$member_login[member_email]." <p>";
				$strMessage .= "<p><b> เบอร์ติดต่อ : </b>".$member_login[member_phone]."  <p>";
				$strMessage .= "<p><b> ที่อยู่จัดส่ง : </b>".$member_login[member_address]."  <p>";
				$strMessage .= "<p><b> รหัสไปรษณีย์ : </b>".$member_login[member_zipcode]."  <p>";
				$strMessage .= "<p><b> รหัสผ่าน : </b>".$member_login[member_password]."  <p>";
				$strMessage .= "<p><b> เป็นสมาชิกเมื่อ </b> : ".$member_login[member_now]."  <p>";
				$strMessage .= "<p><b> ".$fixed[fixed_website]." </b> <p>";

				$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);

				echo"<script> alert('สมัครสมาชิกเรียบร้อยแล้ว'); window.location='profile.php'; </script>";
			}
		}
	}

	
}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="canonical" href="https://<? echo $fixed[fixed_website]; ?>" >
	<title><? if($_SESSION[Language]== "Thailand"){echo "สมัครสมาชิก"; } else{echo "sign up"; } ?> | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>) ">
	<meta name="keywords" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<meta name="author" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navber.php'; ?>
	<div class="container ">
		<div class="row margintop30">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<p class="pagetopic">
							<? if($_SESSION[Language]== "Thailand"){echo "สมัครสมาชิก"; } else{echo "sign up"; } ?>	
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default  no-boxsha text1">
							<div class="panel-body bg-white">
								<form method="post">
									<div class="form-group">
										<label class="control-label"><? if($_SESSION[Language]== "Thailand"){echo "เบอร์โทร"; } else{echo "phone"; } ?>  <span class="text-red"> *  </span>   </label>
										<input  name="member_phone" type="text" class="form-control " minlength="4" maxlength="12" required>
									</div>
									<div class="form-group">
										<label class="control-label"> <? if($_SESSION[Language]== "Thailand"){echo "อีเมล"; } else{echo "email"; } ?>   <span class="text-red"> *  </span> </label>
										<input name="member_email" type="email" class="form-control " minlength="4" maxlength="150" required>
									</div>
									<div class="form-group">
										<label class="control-label"> <? if($_SESSION[Language]== "Thailand"){echo "ชื่อ - นามสกุล"; } else{echo "full name"; } ?>  <span class="text-red"> *  </span>   </label>
										<input  name="member_name" type="text" class="form-control " minlength="4" maxlength="150" required>
									</div>
									<div class="form-group">
										<label class="control-label"> <? if($_SESSION[Language]== "Thailand"){echo "ที่อยู่จัดส่ง"; } else{echo "address"; } ?>  <span class="text-red"> *  </span>   </label>
										<textarea required name="member_address" class="form-control " placeholder="(ตัวอย่าง) 333/3 ถนนวิภาวดีรังสิต แขวง/ตำบล จอมพล เขต/อำเภอ จตุจักร จังหวัด กรุงเทพมหานคร "  minlength="4" maxlength="1000"  ></textarea>
									</div>
									<div class="form-group">
										<label class="control-label"><? if($_SESSION[Language]== "Thailand"){echo "รหัสไปรษณีย์"; } else{echo "zipcode"; } ?>  <span class="text-red"> *  </span>   </label>
										<input required name="member_zipcode" type="number" class="form-control " minlength="5" maxlength="7">
									</div>
									<div class="form-group">
										<label class="control-label"><? if($_SESSION[Language]== "Thailand"){echo "รหัสผ่าน"; } else{echo "password"; } ?>  <span class="text-red"> *  </span>   </label>
										<input required name="member_password" type="password" class="form-control " minlength="6" maxlength="15">
									</div>
									<div class="form-group">
										<label class="control-label"><? if($_SESSION[Language]== "Thailand"){echo "ยืนยันรหัสผ่าน"; } else{echo "confirm password"; } ?>  <span class="text-red"> *  </span>   </label>
										<input required name="member_password_con" type="password" class="form-control " minlength="6" maxlength="15">
									</div>
									<button type="submit" class="btn btn-main btn-block btn-lg"><? if($_SESSION[Language]== "Thailand"){echo "สมัครสมาชิก"; } else{echo "submit"; } ?></button>
									<input type="hidden" name="submit_signup" value="x">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<? include 'index_Footer.php'; ?>
</body>
</html>