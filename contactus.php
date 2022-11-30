<? 
include 'index_Include.php'; 
$_SESSION['page'] = 'contactus.php';


if ($_POST['submit_contact']) {

	$contactus_name = trim($_POST['contactus_name']);
	$contactus_name= str_replace("'","&#39;",$contactus_name);
	$contactus_name= str_replace("\"","&quot;",$contactus_name);

	$contactus_last = trim($_POST['contactus_last']);
	$contactus_last= str_replace("'","&#39;",$contactus_last);
	$contactus_last= str_replace("\"","&quot;",$contactus_last);

	$contactus_email = trim($_POST['contactus_email']);
	$contactus_email= str_replace("'","&#39;",$contactus_email);
	$contactus_email= str_replace("\"","&quot;",$contactus_email);

	$contactus_message = trim($_POST['contactus_message']);
	$contactus_message= str_replace("'","&#39;",$contactus_message);
	$contactus_message= str_replace("\"","&quot;",$contactus_message);

	$contactus_phone = trim($_POST['contactus_phone']);
	$contactus_phone= str_replace("'","&#39;",$contactus_phone);
	$contactus_phone= str_replace("\"","&quot;",$contactus_phone);


	$ContactUs_Add = "INSERT INTO `contactus` (`contactus_date`,`contactus_time`,`contactus_phone`,`contactus_last`,`contactus_name`,`contactus_email`,`contactus_message`) "; 
	$ContactUs_Add .=" VALUES (NOW(),NOW(),'$contactus_phone','$contactus_last','$contactus_name','$contactus_email','$contactus_message')";
	$ContactUs_Reult = mysqli_query($con,$ContactUs_Add);

	if (!$ContactUs_Reult) {
		echo"<script>alert('Error'); window.history.back(); </script>";
	}
	if ($ContactUs_Reult) {

		$To = $fixed[fixed_inbox];
		$Subject = "  ติดต่อเรา ".$fixed[fixed_website];
		$Header = "Content-type: text/html; charset=utf-8\n";
		$Header .= "From: ".$fixed[fixed_sent]."\n";

		$Message = " <h3>มีการฝากข้อมูล ติดต่อเรา</h3>   ";
		$Message .= "<p><b> ชื่อ </b>: ".$contactus_name." </p>";
		$Message .= "<p><b> นามสกุล  </b>: ".$contactus_last." </p>";
		$Message .= "<p><b>อีเมล </b>: ".$contactus_email." </p>";
		$Message .= "<p><b> เบอร์โทรศัพท์</b>: ".$contactus_phone." </p>";
		$Message .= "<p><b> ข้อความ </b>: ".$contactus_message." </p>";
		$Message .= "<p><b> ".$fixed[fixed_website]." </b> <p>";
		$flgSend = mail($To,$Subject,$Message,$Header); 
		echo"<script> alert('ส่งข้อความเรียบร้อยแล้ว'); window.location='contactus.php'; </script>";

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="canonical" href="https://<? echo $fixed[fixed_website]; ?>" >
	<title> <? if($_SESSION[Language]== "Thailand"){echo "ติดต่อเรา"; } else{echo "contact us"; } ?> <? echo $fixed[fixed_company]; ?> - <? echo $fixed[fixed_topic]; ?> | <? echo $fixed[fixed_website]; ?> </title>
	<meta name="description" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>) ">
	<meta name="keywords" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<meta name="author" content="- <? echo $fixed[fixed_topic]; ?> (<? echo $fixed[fixed_website]; ?>)">
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navber.php'; ?>
	<div class="container betwixt30">
		<div class="row ">
			<div class="col-md-12 resize">
				<p class="pagetopic">
					<? if($_SESSION[Language]== "Thailand"){echo "ติดต่อเรา"; } else{echo "contact us"; } ?>
				</p>
			</div>
		</div>
		<div class="row ">
			<div class="col-md-4">
				<? 
				$pagecontent_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'contactus' ";
				$pagecontent_QR = mysqli_query($con,$pagecontent_SL);
				$pagecontent 	= mysqli_fetch_array($pagecontent_QR);
				if (isset($pagecontent[pagecontent_review])&&trim($pagecontent[pagecontent_review])!='') {
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default no-boxsha radius20" style="overflow: hidden;">
								<div class="panel-body bg-white ">
									<? echo $pagecontent[pagecontent_review]; ?> 
								</div>
							</div>
						</div>
					</div>
					<?
				}
				?>
			</div>
			<div class="col-md-8">
				<div id="GoogleMaps" class="GoogleMaps">
					<? echo $fixed[fixed_googlemaps]; ?>
				</div>
				<div class="panel panel-default no-boxsha text1 radius20" style="overflow: hidden;">
					<div class="panel-body bg-white ">
						<form method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" >   <? if($_SESSION[Language]== "Thailand"){echo "ชื่อ"; } else{echo "name"; } ?> <span class="text-red"> * </span>  </label>
										<input required name="contactus_name" type="text"  class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"> <? if($_SESSION[Language]== "Thailand"){echo "นามสกุล"; } else{echo "lastname"; } ?> <span class="text-red"> * </span> </label>
										<input required name="contactus_last" type="text" class="form-control"  >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" >   <? if($_SESSION[Language]== "Thailand"){echo "เบอร์โทรศัพท์"; } else{echo "phone"; } ?> <span class="text-red"> * </span>  </label>
										<input required name="contactus_phone" type="text"   class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" >   <? if($_SESSION[Language]== "Thailand"){echo "อีเมล"; } else{echo "email"; } ?>   </label>
										<input  name="contactus_email" type="email"  class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label" > <? if($_SESSION[Language]== "Thailand"){echo "ข้อความ"; } else{echo "message"; } ?> </label>
								<textarea id="contactus_message" class="form-control" rows="4" name="contactus_message"  maxlength="250" ></textarea>
								<span id="contactus_message_chars"  class="text-muted"> </span>
								<script type="text/javascript">
									var contactus_message = 250;
									$('#contactus_message').keyup(function() {
										var length = $(this).val().length;
										var length = contactus_message-length;
										$('#contactus_message_chars').text(length);
									});
								</script>
							</div>
							<button type="submit" class="btn btn-main "> 
								<span class="glyphicon glyphicon-envelope"></span>
								  <? if($_SESSION[Language]== "Thailand"){echo "ส่งข้อความ"; } else{echo "submit"; } ?> 
							</button>
							<input type="hidden" name="submit_contact" value="x">
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- row -->
		<div class="row hidden-sm hidden-xs margintop30 text1" >
			<div class="col-md-12">
				<ul class="breadcrumb" style="margin-bottom: 0px;">
					<li><a href="index.php"> <? if($_SESSION[Language]== "Thailand"){echo "หน้าแรก"; } else{echo "Home"; } ?> </a></li>
					<li>
						<a onclick="goBack();" href="#">
							<? if($_SESSION[Language]== "Thailand"){echo "กลับ"; } else{echo "Back"; } ?> 
						</a>
					</li>        
					<li class="active"><a href="contactus.php"> <? if($_SESSION[Language]== "Thailand"){echo "ติดต่อเรา"; } else{echo "contact us"; } ?> </a></li>
				</ul>
			</div>
		</div>
	</div>
	<? include 'index_Footer.php'; ?>
</body>
</html>