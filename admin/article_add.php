<? 
include 'index_IncludeAdmin.php'; 
$_SESSION['page'] = 'article.php';

if ($_POST['article_Add']) {

	$Jpg = strrchr($_FILES["article_photo"]["name"],".");
	$article_photo = rand().rand().$Jpg;

	if(move_uploaded_file($_FILES["article_photo"]["tmp_name"],"../cloud/article_photo/".$article_photo)){
		$article_name_eng = function_teeth($_POST['article_name_eng']);
		$article_detail_eng = function_teeth($_POST['article_detail_eng']);
		$article_review_eng = function_teeth($_POST['article_review_eng']);
		$article_name = function_teeth($_POST['article_name']);
		$_SESSION[article_name] =  $_POST['article_name'];

		$article_detail = function_teeth($_POST['article_detail']);
		$article_review = function_review($_POST['article_review']);
		$article_page = rand();
		$article_Add = "INSERT INTO `article` (`article_name_eng`,`article_detail_eng`,`article_review_eng`,`article_page`,`article_name`, `article_detail`, `article_photo`,`article_review`,`article_datetime`,`article_date`,`article_time`)
		VALUES('$article_name_eng','$article_detail_eng','$article_review_eng','$article_page','$article_name','$article_detail','$article_photo','$article_review',now(),now(),now())";

		$article_Reult = mysqli_query($con,$article_Add);
		$_SESSION[article_id] = mysqli_insert_id($con);

		if (!$article_Reult) {
			echo"<script>alert('เกิดข้อผิดพลาด หรือ ลิ้งเพจซ้ำ'); window.history.back(); </script>";
		}
		if ($article_Reult) {

			if(isset($_FILES['article_picture_photo']['name'])&&$_FILES['article_picture_photo']['name']!=''){
				$Count = count($_FILES['article_picture_photo']['name']);
				for ($i=0; $i < $Count; $i++) { 

					$Jpg = strrchr($_FILES["article_picture_photo"]["name"][$i],".");
					$article_picture_photo = rand().rand().$Jpg;

					if(move_uploaded_file($_FILES["article_picture_photo"]["tmp_name"][$i],"../cloud/article_picture_photo/".$article_picture_photo)){
						$article_picture_Add = "INSERT INTO `article_picture` (`article_id`,`article_picture_photo`) VALUES ('$_SESSION[article_id]','$article_picture_photo')";
						$article_picture_Reult = mysqli_query($con,$article_picture_Add);
						if (!$article_picture_Reult) {
							echo"<script>alert('Error article_picture'); window.history.back(); </script>";
						}
					}
				}
			}

			$article_SL = " SELECT * FROM article WHERE article_id = '$_SESSION[article_id]'";
			$article_QR = mysqli_query($con,$article_SL);
			$article 	= mysqli_fetch_array($article_QR);

			$article_page = function_page($_SESSION[article_name]);
			$article_page = $article_page."-บทความ-".$_SESSION[article_id];

			$article_Update = "UPDATE `article` SET  `article_page` = '$article_page' WHERE `article_id` = '$_SESSION[article_id]'";
			$article_Reult = mysqli_query($con,$article_Update);


			echo"<script>  window.location='article_one.php?INSERT'; </script>";
		}	

	}
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<? include 'index_Head.php'; ?>
</head>
<body>
	<? include 'index_Navbar.php'; ?>	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2" id="main-left">
				<div class="row">
					<div class="col-md-12">
						<? include 'index_AdminMenu.php'; ?>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						<h3>  เพิ่ม บทความ   </h3>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 br-margin2">
						<a href="article.php" class="btn btn-primary"><span class="glyphicon glyphicon-step-backward"></span> กลับ </a>
					</div>
					<div class="col-md-12">
						<form class="form-horizontal" method="post" encType="multipart/form-data">
							<div class="panel panel-default">
								<div class="panel-heading">
									กรอกรายละเอียด "บทความ" ที่ต้องการเพิ่ม
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-md-3" > รูป บทความ <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input Type="file" class="form-control"  name="article_photo"  required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > ชื่อบทความ  <span class="text-red"> * </span> </label>
										<div class="col-md-6">
											<input id="article_name" type="text" class="form-control"  name="article_name"  required  maxlength="80" placeholder="ความยาวไม่เกิน 80  ตัวอักษร" >
										</div>
										<label class="control-label col-md-3 text-left" > <span id="article_name_chars" class="text-muted">  </span>  </label>
										<script type="text/javascript">
											var article_name = 80;
											$('#article_name').keyup(function() {
												var length = $(this).val().length;
												var length = article_name-length;
												$('#article_name_chars').text(length);
											});
										</script>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" > รายละเอียดเบื้องต้น </label>
										<div class="col-md-6">
											<textarea id="article_detail" class="form-control" rows="4" name="article_detail"  maxlength="250" placeholder="รายละเอียดแนะนำ สั้นๆ ความยาวไม่เกิน 250  ตัวอักษร"></textarea>
										</div>
										<label class="control-label col-md-2 text-left" > <span id="article_detail_chars"  class="text-muted">  </span>  </label>
										<script type="text/javascript">
											var article_detail = 250;
											$('#article_detail').keyup(function() {
												var length = $(this).val().length;
												var length = article_detail-length;
												$('#article_detail_chars').text(length);
											});
										</script>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3" > รูปภาพเพิ่มเติม  </label>
										<div class="col-md-6">
											<input type="file"  class="form-control" multiple="multiple" name="article_picture_photo[]">
										</div>
										<label class="control-label col-md-3 text-left" >
											สามารถเพิ่มได้ภายหลัง
										</label>
									</div>
									<div class="form-group"> 
										<div class="col-md-offset-3 col-md-6">
											<button Type="submit"  class="btn btn-success">
												<span class="glyphicon glyphicon-plus-sign"></span> ยืนยันการเพิ่ม
											</button>
											<input Type="hidden" name="article_Add" value="x">
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									เนื้อหา
								</div>
								<div class="panel-body">
									<textarea class="ckeditor" name="article_review">

									</textarea>
								</div>
							</div>
						</form>
					</div>
					<!-- 12 -->
				</div>
				<!-- row -->
			</div>
			<!-- 10 -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</body>
</html>


