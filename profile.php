<? 
include 'index_Include.php'; 
$_SESSION['page'] = 'profile.php';

if ($_POST['Updatemember']) {
	$member_name 	= teeth($_POST['member_name']);
	$member_email 	= teeth($_POST['member_email']);
	$member_phone 	= teeth($_POST['member_phone']);
	$member_address 	= teeth($_POST['member_address']);
	$member_zipcode 	= teeth($_POST['member_zipcode']);
	$member_Up = "UPDATE member SET member_name = '$member_name',
	member_phone = '$member_phone',
	member_email = '$member_email',
	member_address = '$member_address',
	member_zipcode = '$member_zipcode'
	WHERE member_id = '$_SESSION[member_online_id]'";
	$member_Reult = mysqli_query($con,$member_Up);

	if ($member_Reult) {
		echo"<script>alert('แก้ไขเรียบร้อยแล้ว'); window.location='profile.php';</script>";
	}
	else {
		echo"<script>alert('อีเมลที่ต้องการแก้ไขมีอยู่ในระบบแล้ว'); window.history.back(); </script>";
	}
}

if ($_POST['UpdatePasswordword']) {

	if ($_POST['member_password']!=$_POST['member_passwordCon']) {
		echo"<script>alert('กรุณากรอกรหัสผ่านให้ตรงกันนะคะ'); window.history.back(); </script>";
	}

	else{

		$member_passwordOLD = $_POST['member_passwordOLD'];
		$member_passwordOLD= str_replace("'","&#39;",$member_passwordOLD);
		$member_passwordOLD= str_replace("\"","&quot;",$member_passwordOLD);

		$Check_Add = "SELECT * FROM member WHERE member_id = '$_SESSION[member_online_id]' AND member_password = '$member_passwordOLD' ";
		$Check_Reult = mysqli_query($con,$Check_Add);
		$Check_Row 		= mysqli_num_rows($Check_Reult);

		if (!$Check_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
		}

		if ($Check_Row > 0) {

			$member_password = $_POST['member_password'];
			$member_password= str_replace("'","&#39;",$member_password);
			$member_password= str_replace("\"","&quot;",$member_password);

			$member_Update = "UPDATE member SET member_password = '$member_password' WHERE member_id = '$_SESSION[member_online_id]' ";
			$member_Reult = mysqli_query($con,$member_Update);

			if ($member_Reult) {
				echo"<script>alert('แก้ไขเรียบร้อยแล้ว'); window.location='profile.php';</script>";
			}

		}
		else{
			echo"<script>alert('คุณกรอกรหัสผ่านปัจจุบันไม่ถูกต้องค่ะ'); window.history.back(); </script>";
		}

	}
}




?>
<!DOCTYPE html>
<html>
<head>
	<link rel="canonical" href="https://<? echo $fixed[fixed_website]; ?>" >
	<title> <? if($_SESSION[Language]== "Thailand"){echo "ข้อมูลส่วนตัว"; } else{echo "Profile"; } ?> :  <?php echo $member[member_name]; ?> | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>) ">
	<meta name="keywords" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<meta name="author" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navber.php'; ?>
	<div class="container">
		<div class="row margintop30">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12 resize">
						<p class=" pagetopic ">
							<? if($_SESSION[Language]== "Thailand"){echo "ข้อมูลส่วนตัว"; } else{echo "Profile"; } ?> :  <?php echo $member[member_name]; ?>
						</p>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default no-boxsha" style="overflow: hidden;">
							<div class="panel-body bg-white ">
								<form class="form-horizontal text1">
									<div class="form-group">
										<label class="control-label col-md-4" ><? if($_SESSION[Language]== "Thailand"){echo "ชื่อ - นามสกุล"; } else{echo "full name"; } ?></label>
										<label class="control-label col-md-8 text-left">
											<? echo $member[member_name]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4" ><? if($_SESSION[Language]== "Thailand"){echo "อีเมล"; } else{echo "email"; } ?> </label>
										<label class="control-label col-md-8 text-left">
											<? 
											if (isset($member[member_email])&& trim($member[member_email])!='') {
												echo $member[member_email]; 
											}
											else{
												echo "-";
											}
											?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4" ><? if($_SESSION[Language]== "Thailand"){echo "เบอร์โทร"; } else{echo "phone"; } ?></label>
										<label class="control-label col-md-8 text-left">
											<? echo $member[member_phone]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4" ><? if($_SESSION[Language]== "Thailand"){echo "ที่อยู่จัดส่ง"; } else{echo "Address"; } ?></label>
										<label class="control-label col-md-8 text-left">
											<? echo $member[member_address]; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-4" ><? if($_SESSION[Language]== "Thailand"){echo "รหัสไปรษณีย์"; } else{echo "zipcode"; } ?></label>
										<label class="control-label col-md-8 text-left">
											<? echo $member[member_zipcode]; ?>
										</label>
									</div>
									<div class="form-group"> 
										<div class="col-sm-offset-4 col-sm-8">
											<button type="button" class="btn btn-default" data-toggle="modal" data-target="#Updatemember">
												<i class='fas fa-user-edit text-black'></i>
												<? if($_SESSION[Language]== "Thailand"){echo "แก้ไขข้อมูลส่วนตัว"; } else{echo "Update profile"; } ?>
											</button> 
											<button type="button" class="btn btn-default" data-toggle="modal" data-target="#UpdatePasswordword">
												<i class='far fa-edit text-black'></i>
												<? if($_SESSION[Language]== "Thailand"){echo "แก้ไขรหัสผ่าน"; } else{echo "Update password"; } ?>
											</button> 
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- row -->
	</div>
	<div id="Updatemember" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel"> <i class='fas fa-user-edit text-black'></i> <? if($_SESSION[Language]== "Thailand"){echo "แก้ไขข้อมูลส่วนตัว"; } else{echo "Update profile"; } ?> </h4>
					</div>
					<div class="modal-body text1">
						<div class="form-group">
							<label class="control-label" for="email"><? if($_SESSION[Language]== "Thailand"){echo "ชื่อ - นามสกุล"; } else{echo "full name"; } ?></label>
							<input minlength="5" name="member_name" value="<? echo $member[member_name]; ?>" type="text"  class="form-control"  required>
						</div>
						<div class="form-group">
							<label class="control-label" for="email"><? if($_SESSION[Language]== "Thailand"){echo "อีเมล"; } else{echo "email"; } ?> </label>
							<input  minlength="5" name="member_email" value="<? echo $member[member_email]; ?>" type="email" class="form-control" >
						</div>
						<div class="form-group">
							<label class="control-label" for="email"><? if($_SESSION[Language]== "Thailand"){echo "เบอร์โทร"; } else{echo "phone"; } ?>  </label>
							<input  minlength="5" name="member_phone" value="<? echo $member[member_phone]; ?>" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="email"><? if($_SESSION[Language]== "Thailand"){echo "ที่อยู่จัดส่ง"; } else{echo "Address"; } ?>  </label>
							<textarea class="form-control" rows="2" name="member_address" ><? echo $member[member_address]; ?></textarea>
						</div>
						<div class="form-group">
							<label class="control-label" for="email"> <? if($_SESSION[Language]== "Thailand"){echo "รหัสไปรษณีย์"; } else{echo "zipcode"; } ?>  </label>
							<input  minlength="5" name="member_zipcode" value="<? echo $member[member_zipcode]; ?>" type="text" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-floppy-disk"></span> <? if($_SESSION[Language]== "Thailand"){echo "บันทึกการแก้ไข"; } else{echo "Submit"; } ?>
						</button>
						<input Type="hidden" name="Updatemember" value="x">
						<button type="button" class="btn btn-default" data-dismiss="modal"><? if($_SESSION[Language]== "Thailand"){echo "ยกเลิก"; } else{echo "Close"; } ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="UpdatePasswordword"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">
							<i class='far fa-edit text-black'></i>
							<? if($_SESSION[Language]== "Thailand"){echo "แก้ไขรหัสผ่าน"; } else{echo "Update password"; } ?>
						</h4>
					</div>
					<div class="modal-body text1">
						<div class="form-group">
							<label for="recipient-name" class="control-label"> <? if($_SESSION[Language]== "Thailand"){echo "รหัสผ่านปัจจุบัน"; } else{echo "Current password"; } ?> <span class="text-red"> * </span>  </label>
							<input minlength="4" type="password" class="form-control" required name="member_passwordOLD">
						</div>
						<div class="form-group">
							<label for="message-text" class="control-label"> <? if($_SESSION[Language]== "Thailand"){echo "รหัสผ่านใหม่"; } else{echo "New password"; } ?> <span class="text-red"> * </span> </label>
							<input minlength="4" type="password" class="form-control"  required name="member_password">
						</div>
						<div class="form-group">
							<label for="message-text" class="control-label"> <? if($_SESSION[Language]== "Thailand"){echo "ยืนยันรหัสผ่านใหม่"; } else{echo "Confirm new password"; } ?> <span class="text-red"> * </span> </label>
							<input minlength="4" type="password" class="form-control"  required name="member_passwordCon">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-floppy-disk"></span> <? if($_SESSION[Language]== "Thailand"){echo "บันทึกการแก้ไข"; } else{echo "Submit"; } ?>
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal"><? if($_SESSION[Language]== "Thailand"){echo "ยกเลิก"; } else{echo "Close"; } ?></button>
						<input Type="hidden" name="UpdatePasswordword" value="x">
					</div>
				</form>
			</div>
		</div>
	</div>
	<? include 'index_Footer.php'; ?>
</body>
</html>